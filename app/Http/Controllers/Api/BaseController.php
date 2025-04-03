<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Commentaire;
use App\Models\Horaire;
use App\Models\User;
use App\Models\UserFavoris;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message, $code = 200)
    {
        // Log de la réponse réussie
        Log::debug('Envoi d\'une réponse réussie', [
            'controller' => 'BaseController',
            'method' => 'sendResponse',
            'code' => $code,
            'message' => $message
        ]);

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
        // Log de la réponse d'erreur
        Log::warning('Envoi d\'une réponse d\'erreur', [
            'controller' => 'BaseController',
            'method' => 'sendError',
            'code' => $code,
            'error' => $error,
            'errorMessages' => $errorMessages
        ]);

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
        // Log de la génération d'une chaîne aléatoire
        Log::debug('Génération d\'une chaîne aléatoire', [
            'controller' => 'BaseController',
            'method' => 'randomString',
            'length' => $length
        ]);

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
        // Log de l'envoi d'un SMS
        Log::debug('Tentative d\'envoi de SMS', [
            'controller' => 'BaseController',
            'method' => 'sendSms',
            'user_id' => $user->id,
            'phone' => $phone
        ]);

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

        // Log du résultat de l'envoi du SMS
        if ($err) {
            Log::error('Erreur lors de l\'envoi du SMS', [
                'controller' => 'BaseController',
                'method' => 'sendSms',
                'user_id' => $user->id,
                'phone' => $phone,
                'error' => $err
            ]);
            return $err;
        } else {
            Log::info('SMS envoyé avec succès', [
                'controller' => 'BaseController',
                'method' => 'sendSms',
                'user_id' => $user->id,
                'phone' => $phone,
                'response' => $response
            ]);
            return $response;
        }
    }

    public function getMoyenneRatingByEtablissmeent($etablissement_id)
    {
        // Log du calcul de la moyenne des notes
        Log::debug('Calcul de la moyenne des notes d\'un établissement', [
            'controller' => 'BaseController',
            'method' => 'getMoyenneRatingByEtablissmeent',
            'etablissement_id' => $etablissement_id
        ]);

        $commentaires = Commentaire::where('etablissement_id', $etablissement_id)->get();
        $moyenne = 0;
        foreach ($commentaires as $commentaire) {
            $moyenne += $commentaire->rating;
        }
        if ($moyenne == 0) {
            return 0;
        }

        $resultat = $moyenne / count($commentaires);

        // Log du résultat
        Log::debug('Moyenne des notes calculée', [
            'controller' => 'BaseController',
            'method' => 'getMoyenneRatingByEtablissmeent',
            'etablissement_id' => $etablissement_id,
            'moyenne' => $resultat,
            'nombre_commentaires' => count($commentaires)
        ]);

        return $resultat;
    }

    public function getCommentNumberByEtablissmeent($etablissement_id)
    {
        // Log du comptage des commentaires
        Log::debug('Comptage des commentaires d\'un établissement', [
            'controller' => 'BaseController',
            'method' => 'getCommentNumberByEtablissmeent',
            'etablissement_id' => $etablissement_id
        ]);

        $commentaires = Commentaire::where('etablissement_id', $etablissement_id)->get();
        $count = count($commentaires);

        // Log du résultat
        Log::debug('Nombre de commentaires compté', [
            'controller' => 'BaseController',
            'method' => 'getCommentNumberByEtablissmeent',
            'etablissement_id' => $etablissement_id,
            'count' => $count
        ]);

        return $count;
    }

    public function countOccurenceRatingInCommentTableByEtablissement($etablissement_id)
    {
        // Log du comptage des occurrences de notes
        Log::debug('Comptage des occurrences de notes pour un établissement', [
            'controller' => 'BaseController',
            'method' => 'countOccurenceRatingInCommentTableByEtablissement',
            'etablissement_id' => $etablissement_id
        ]);

        $result = DB::table('commentaires')
            ->select(DB::raw('count(*) as count, rating'))
            ->where('etablissement_id', $etablissement_id)
            ->groupBy('rating')
            ->get();

        // Log du résultat
        Log::debug('Occurrences de notes comptées', [
            'controller' => 'BaseController',
            'method' => 'countOccurenceRatingInCommentTableByEtablissement',
            'etablissement_id' => $etablissement_id,
            'result_count' => count($result)
        ]);

        return $result;
    }

    public function checkIfEtablissementInFavoris($id, $user_id)
    {
        // Log de la vérification des favoris
        Log::debug('Vérification si un établissement est en favoris pour un utilisateur', [
            'controller' => 'BaseController',
            'method' => 'checkIfEtablissementInFavoris',
            'etablissement_id' => $id,
            'user_id' => $user_id
        ]);

        $userFavoris = UserFavoris::where('user_id', $user_id)->where('etablissement_id', $id)->first();
        $result = ($userFavoris) ? true : false;

        // Log du résultat
        Log::debug('Résultat de la vérification des favoris', [
            'controller' => 'BaseController',
            'method' => 'checkIfEtablissementInFavoris',
            'etablissement_id' => $id,
            'user_id' => $user_id,
            'is_favoris' => $result
        ]);

        return $result;
    }



    public function checkIfEtablassimentInDataArray($etablissement, $data)
    {
        // Log de la vérification de l'établissement dans le tableau
        Log::debug('Vérification si un établissement est dans un tableau de données', [
            'controller' => 'BaseController',
            'method' => 'checkIfEtablassimentInDataArray',
            'etablissement_id' => $etablissement->id
        ]);

        foreach ($data as $value) {
            if ($value->id == $etablissement->id) {
                return true;
            }
        }
        return false;
    }

    // Convert day string to int day of week
    public function convertDayToInt($day)
    {
        // Log de la conversion du jour de la semaine
        Log::debug('Conversion d\'un jour en entier', [
            'controller' => 'BaseController',
            'method' => 'convertDayToInt',
            'day' => $day
        ]);

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

    // get all Horaires by Etablissement and convert horaire jour to int day of week
    public function getAllHorairesByEtablissement($idEtablissement)
    {
        // Log de la récupération des horaires
        Log::debug('Récupération des horaires d\'un établissement', [
            'controller' => 'BaseController',
            'method' => 'getAllHorairesByEtablissement',
            'etablissement_id' => $idEtablissement
        ]);

        $horaires = Horaire::where('etablissement_id', $idEtablissement)->get();
        foreach ($horaires as $horaire) {
            $horaire->jour = $this->convertDayToInt($horaire->jour);
        }

        // Log du résultat
        Log::debug('Horaires récupérés et convertis', [
            'controller' => 'BaseController',
            'method' => 'getAllHorairesByEtablissement',
            'etablissement_id' => $idEtablissement,
            'count' => count($horaires)
        ]);

        return $horaires;
    }

    // Convert plageHoraire example1:07:00-11:00;13:00-17:00 from Horaires to Time and return json response
    public function convertPlageHoraireToTime($plageHoraire)
    {
        // Log de la conversion des plages horaires
        Log::debug('Conversion des plages horaires', [
            'controller' => 'BaseController',
            'method' => 'convertPlageHoraireToTime',
            'plageHoraire' => $plageHoraire
        ]);

        $plageHoraire1 = explode(";", $plageHoraire);
        $data = array();
        foreach ($plageHoraire1 as $plage) {
            $plage1 = explode("-", $plage);
            $data[] = array(
                'debut' => $plage1[0],
                'fin' => $plage1[1]
            );
        }

        // Log du résultat
        Log::debug('Plages horaires converties', [
            'controller' => 'BaseController',
            'method' => 'convertPlageHoraireToTime',
            'result_count' => count($data)
        ]);

        return $data;
    }

    // check if Etablissement is open now
    public function checkIfEtablissementIsOpen($idEtablissement)
    {
        // Log de la vérification d'ouverture
        Log::debug('Vérification si un établissement est ouvert', [
            'controller' => 'BaseController',
            'method' => 'checkIfEtablissementIsOpen',
            'etablissement_id' => $idEtablissement
        ]);

        $horaires = $this->getAllHorairesByEtablissement($idEtablissement);
        $now = Carbon::now();
        $nowH = $now->format('H:i');
        foreach ($horaires as $horaire) {
            if ($horaire->jour == $now->dayOfWeek) {
                $plageHoraire = $this->convertPlageHoraireToTime($horaire->plage_horaire);
                foreach ($plageHoraire as $plage) {
                    if ($nowH >= $plage['debut'] && $nowH <= $plage['fin']) {
                        // Log du résultat positif
                        Log::info('Établissement ouvert', [
                            'controller' => 'BaseController',
                            'method' => 'checkIfEtablissementIsOpen',
                            'etablissement_id' => $idEtablissement,
                            'current_time' => $nowH,
                            'day_of_week' => $now->dayOfWeek,
                            'plage_debut' => $plage['debut'],
                            'plage_fin' => $plage['fin']
                        ]);
                        return true;
                    }
                }
            }
        }

        // Log du résultat négatif
        Log::info('Établissement fermé', [
            'controller' => 'BaseController',
            'method' => 'checkIfEtablissementIsOpen',
            'etablissement_id' => $idEtablissement,
            'current_time' => $nowH,
            'day_of_week' => $now->dayOfWeek
        ]);

        return false;
    }

    /**
     * Calculates the great-circle distance between two points, with
     * the Vincenty formula.
     * @param float $latitudeFrom Latitude of start point in [deg decimal]
     * @param float $longitudeFrom Longitude of start point in [deg decimal]
     * @param float $latitudeTo Latitude of target point in [deg decimal]
     * @param float $longitudeTo Longitude of target point in [deg decimal]
     * @param float $earthRadius Mean earth radius in [m]
     * @return float Distance between points in [m] (same as earthRadius)
     */
    public static function vincentyGreatCircleDistance(
        $latitudeFrom,
        $longitudeFrom,
        $latitudeTo,
        $longitudeTo,
    ) {
        // Log du calcul de distance
        Log::debug('Calcul de distance entre deux points', [
            'method' => 'vincentyGreatCircleDistance',
            'latitudeFrom' => $latitudeFrom,
            'longitudeFrom' => $longitudeFrom,
            'latitudeTo' => $latitudeTo,
            'longitudeTo' => $longitudeTo
        ]);

        $pi80 = M_PI / 180;
        $latitudeFrom *= $pi80;
        $longitudeFrom *= $pi80;
        $latitudeTo *= $pi80;
        $longitudeTo *= $pi80;
        $r = 6372.797; // radius of Earth in km 6371
        $dlat = $latitudeTo - $latitudeFrom;
        $dlon = $longitudeTo - $longitudeFrom;
        $a = sin($dlat / 2) * sin($dlat / 2) + cos($latitudeFrom) * cos($latitudeTo) * sin($dlon / 2) * sin($dlon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $km = $r * $c;

        // Log du résultat
        Log::debug('Distance calculée', [
            'method' => 'vincentyGreatCircleDistance',
            'distance_km' => $km
        ]);

        return round($km);
    }
}
