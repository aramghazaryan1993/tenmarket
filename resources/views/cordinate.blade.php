
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<meta name="csrf-token" content="{{ csrf_token() }}" />

<script type="text/javascript">


$(document).ready(function(){

	 navigator.geolocation.getCurrentPosition(function(position)  {
				// , 127.728064,53.413341
			      $.ajax({
					    url: 'https://geocode-maps.yandex.ru/1.x/?apikey=28bfdc28-a08e-4e67-b0bc-638110ae0fba&geocode=127.728064,53.413341&format=json&lang=ru_RU',
					  }).done(function(data) {
					     var json = JSON.stringify(data.response.GeoObjectCollection.featureMember);
					     var json_obj = JSON.parse(json);
					     var region = (json_obj[0].GeoObject.metaDataProperty.GeocoderMetaData.Address.Components[2]['name']);
					          $('div[class="new"]').html(region);
                             alert(region)

					  });

		          });
		});

</script>



