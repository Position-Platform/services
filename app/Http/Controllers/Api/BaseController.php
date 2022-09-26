<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Commentaire;
use App\Models\Etablissement;
use App\Models\Horaire;
use App\Models\User;
use App\Models\UserFavoris;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message, $code = 200)
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];

        return response()->json($response, $code);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 400)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }

    /**
     * generate random String.
     *
     * @return String
     */
    public function randomString($length = 8)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function sendSms(User $user, $phone, $passworduser)
    {

        $username = env("NEXAH_USERNAME");
        $password = env("NEXAH_PASSWORD");
        $message = "Vos Paramètres de connexion à votre compte sont les suivants : \nPhone : $user->phone \nPassword : $passworduser \n \nSuivez le lien ci-dessous pour activer votre compte: \n \n " . env("APP_URL") . "/api/auth/phone/verify/" . $user->id;


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api-public.ekotech.cm/messages",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "username=$username&password=$password&msisdn=$phone&msg=$message&sender=POSITION",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);



        if ($err) {
            return $err;
        } else {
            return $response;
        }
    }

    public function  getMoyenneRatingByEtablissmeent($etablissement_id)
    {

        $commentaires = Commentaire::where('etablissement_id', $etablissement_id)->get();
        $moyenne = 0;
        foreach ($commentaires as $commentaire) {
            $moyenne += $commentaire->rating;
        }
        if ($moyenne == 0) {
            return 0;
        }
        return $moyenne / count($commentaires);
    }

    public function getCommentNumberByEtablissmeent($etablissement_id)
    {
        $commentaires = Commentaire::where('etablissement_id', $etablissement_id)->get();
        return count($commentaires);
    }

    public function countOccurenceRatingInCommentTableByEtablissement($etablissement_id)
    {
        return  DB::table('commentaires')
            ->select(DB::raw('count(*) as count, rating'))
            ->where('etablissement_id', $etablissement_id)
            ->groupBy('rating')
            ->get();
    }

    public function checkIfEtablissementInFavoris($etablissement, $user_id)
    {
        $userFavoris = UserFavoris::where('user_id', $user_id)->where('etablissement_id', $etablissement->id)->first();
        if ($userFavoris) {
            return true;
        } else {
            return false;
        }
    }



    public function  checkIfEtablassimentInDataArray($etablissement, $data)
    {
        foreach ($data as  $value) {
            if ($value->id == $etablissement->id) {
                return true;
            }
        }
        return false;
    }

    //Convert day string to int day of week
    public function convertDayToInt($day)
    {
        switch ($day) {
            case 'Lundi':
                return 1;
                break;
            case 'Mardi':
                return 2;
                break;
            case 'Mercredi':
                return 3;
                break;
            case 'Jeudi':
                return 4;
                break;
            case 'Vendredi':
                return 5;
                break;
            case 'Samedi':
                return 6;
                break;
            case 'Dimanche':
                return 7;
                break;
        }
    }

    //get all Horaires by Etablissement and convert horaire jour to int day of week
    public function getAllHorairesByEtablissement($idEtablissement)
    {
        $horaires = Horaire::where('etablissement_id', $idEtablissement)->get();
        foreach ($horaires as $horaire) {
            $horaire->jour = $this->convertDayToInt($horaire->jour);
        }
        return $horaires;
    }

    //Convert plageHoraire example1:07:00-11:00;13:00-17:00 from Horaires to Time and return json response


    public function convertPlageHoraireToTime($plageHoraire)
    {
        $plageHoraire1 = explode(";", $plageHoraire);
        $data = array();
        foreach ($plageHoraire1 as  $plage) {
            $plage1 = explode("-", $plage);
            $data[] = array(
                'debut' => $plage1[0],
                'fin' => $plage1[1]
            );
        }
        return $data;
    }






    //check if Etablissement is open now
    public function checkIfEtablissementIsOpen($idEtablissement)
    {
        $horaires = $this->getAllHorairesByEtablissement($idEtablissement);
        $now = Carbon::now();
        $nowH = $now->format('H:i');
        foreach ($horaires as  $horaire) {
            if ($horaire->jour == $now->dayOfWeek) {
                $plageHoraire = $this->convertPlageHoraireToTime($horaire->plage_horaire);
                foreach ($plageHoraire as  $plage) {
                    if ($nowH >= $plage['debut'] && $nowH <= $plage['fin']) {
                        return true;
                    }
                }
            }
        }
        return false;
    }
}
