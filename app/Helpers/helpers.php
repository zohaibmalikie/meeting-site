<?php
    use App\Category;

    if(!function_exists('getTime'))
    {
        function getTimeZoneTime($ftz,$time)
        {
            date_default_timezone_set($ftz);
            $datetime = new DateTime($time);
            $la_time = new DateTimeZone(getCurrentUserTimeZone());
            $datetime->setTimezone($la_time);
            return date("g:i A", strtotime($datetime->format('H:i')));
        }
    }

    if(!function_exists('getCurrentUserTimeZone'))
    {
        function getCurrentUserTimeZone(){
            if(config('app.live_ip_check')=='local')
            {
                $ip = file_get_contents("http://ipecho.net/plain");
                $url = 'http://ip-api.com/json/'.$ip;
                $tz = file_get_contents($url);
                $tz = json_decode($tz,true)['timezone'];
                return $tz;
            }
            else if(config('app.live_ip_check')=='live')
            {
                $ip = \Request::getClientIp(true);
                $url = 'http://ip-api.com/json/'.$ip;
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
                curl_setopt($curl, CURLOPT_HTTPHEADER, array("content-type: application/json"));
                $response = curl_exec($curl);
                curl_close($curl);
                $tz = json_decode($response,true)['timezone'];
                return $tz;
            }
            
        }
    }

    if(!function_exists('categories'))
    {
        function categories()
        {
            return Category::where('status','active')->get();
        }
    }