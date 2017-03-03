<?php
namespace App\Notifications;

class FirebaseNotificationHelper
{
    public static function send_notification($tokens, $message)
    {
        // API access key from Google API's Console
        define('API_ACCESS_KEY', 'AAAASeodYfI:APA91bFuqSCDUs838T8fEFcyEmHQjADOM2haSUpmS7H_kcwnuPUwhneMdVyP9S0hnoi8BmqStW2tA72JLRPWwoDurwRSRrcmuScw-csD-q6qhd_oWt1j03Mk7HXfUnIYiB4kxBlGOuxD79tITbRfHYlb_2qgOhDRrQ');
        $registrationIds = $tokens;
        // prep the bundle
        $msg = $message->getBody();
        $fields = array
        (
            'registration_ids' => $registrationIds,
            'data' => $msg  //["hola"=>"asdasdsad"]
        );

        $headers = array
        (
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://android.googleapis.com/gcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);
    }
}

//
//namespace App\Notifications;
//
//
//class FirebaseNotificationHelper
//{
//    public static function send_notification($tokens, $message)
//    {
//        $clave_del_servidor = "[";
//
//        $url = 'https://fcm.googleapis.com/fcm/send';
//        $fields =  ["notification" =>[
//                                        "title" => $message->getTitle(),
//                                        "body" => $message->getBody()
//                                     ],
//                    "registration_ids" => $tokens];
//
//        $headers = array(
//            'Authorization:key=AAAASeodYfI:APA91bFuqSCDUs838T8fEFcyEmHQjADOM2haSUpmS7H_kcwnuPUwhneMdVyP9S0hnoi8BmqStW2tA72JLRPWwoDurwRSRrcmuScw-csD-q6qhd_oWt1j03Mk7HXfUnIYiB4kxBlGOuxD79tITbRfHYlb_2qgOhDRrQ',
//            'Content-Type:application/json'
//        );
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_POST, true);
//        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
//        $result = curl_exec($ch);
//        if ($result === FALSE) {
//            die('Curl failed: ' . curl_error($ch));
//        }
//        curl_close($ch);
//        return $result;
//    }
//
//    public static function Could_You_Be_Loved()
//    {
//        $conn = mysqli_connect("localhost", "root", "", "fcm");
//        $sql = " Select Token From users";
//        $result = mysqli_query($conn, $sql);
//        $tokens = array();
//        if (mysqli_num_rows($result) > 0) {
//            while ($row = mysqli_fetch_assoc($result)) {
//                $tokens[] = $row["Token"];
//            }
//        }
//        mysqli_close($conn);
//        $message = array("message" => " FCM PUSH NOTIFICATION TEST MESSAGE");
//        $message_status = send_notification($tokens, $message);
//        echo $message_status;
//    }
//}
//
