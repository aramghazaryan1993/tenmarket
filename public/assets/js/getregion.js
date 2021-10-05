        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        navigator.geolocation.getCurrentPosition(function(position) {

            $.ajax({
                type: "GET",
                url: 'https://geocode-maps.yandex.ru/1.x/?apikey=28bfdc28-a08e-4e67-b0bc-638110ae0fba&geocode=127.728064,53.413341&format=json&lang=ru_RU',
                contentType: "application/json; charset=utf-8",
                dataType: "json",
            }).done(function(data) {
                var json = JSON.stringify(data.response.GeoObjectCollection.featureMember);
                var json_obj = JSON.parse(json);
                var region = (json_obj[0].GeoObject.metaDataProperty.GeocoderMetaData.Address.Components[2]['name']);

                $.ajax({
                    url: 'getregion',
                    type: 'post',
                    data: { _token: CSRF_TOKEN, region: region },
                    success: function(response) {
                        // alert(response);
                    }
                });

            });

        });