//geolocationに対応していた場合
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
        function (position) {
            //位置情報を取得できた場合
            var data = position.coords;

            var lat = data.latitude;
            var lng = data.longitude;
            var alt = data.altitude;
            var acclatlng = data.accuracy;
            var accalt = data.altitudeAccuracy;
            var heading = data.heading;
            var speed = data.speed;

            //位置情報をhtmlに書き出し
            document.getElementById("gpslat").innerHTML = lat;
            document.getElementById("gpslng").innerHTML = lng;
            document.getElementById("gpsalt").innerHTML = alt;
            document.getElementById("acclatlng").innerHTML = acclatlng;
            document.getElementById("accalt").innerHTML = accalt;

            var gpspost = "latitude:" + lat + " , longitude:" + lng + " , altitude:" + alt + " , accuracy of place:" + acclatlng;
            document.forms.input_form.tweettext.value = gpspost;//tweet用の変数を宣言し、hidden要素のvalueに挿入

        },
        function (error) {
            //位置情報を取得できなかった場合
            //0:原因不明、1位置情報の取得許可が出なかった、2電場状況が悪かった,
            //3:タイムアウト

            var errornomber = error.code;
            var errorinfo = [
                "cause unknown",
                "nothing permission",
                "bad connecting",
                "timeout"
            ];
            var errormes = errorinfo[errornomber];

            alert(errormes);
        },

        {
            "enableHighAccuracy": false,
            "timeout": 8000,
            "maximumAge": 2000,
        }
    )
}

else {
    alert("geolocation非対応デバイスです");
}
