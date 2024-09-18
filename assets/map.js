ymaps.ready(init);

function init() {
	var myMap = new ymaps.Map(
		'map',
		{
			center: [55.753995, 37.614069],
			zoom: 9,
		},
		{
			searchControlProvider: 'yandex#search',
		}
	);

	fetch('/getEventsToMap')
		.then(response => response.json())
		.then(cards => {
			cards.forEach(card => {
				var myPlacemark = new ymaps.Placemark(
					[card.event_point_x, card.event_point_y],
					{
						balloonContentHeader: `<div style="font-size: 24px; font-weight: bold; color: #333;">${card.event_title}</div>`,
						balloonContentBody: `
									<div style="font-size: 14px; color: #666;">
											<p>${card.event_description}</p>
											<img src="public/images/${card.event_img}" alt="${card.event_title}" style="max-width: 200px; height: auto; margin-top: 10px; border-radius: 5px;"/>
											<div style="margin-top: 10px;">
													<a href="/card-detail/${card.event_id}" style="
															display: inline-block;
															padding: 10px 20px;
															font-size: 14px;
															color: #fff;
															background-color: #007bff;
															text-decoration: none;
															border-radius: 5px;
															box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
															transition: background-color 0.3s, box-shadow 0.3s;
													" onmouseover="this.style.backgroundColor='#0056b3'; this.style.boxShadow='0 6px 12px rgba(0, 0, 0, 0.3)';" onmouseout="this.style.backgroundColor='#007bff'; this.style.boxShadow='0 4px 8px rgba(0, 0, 0, 0.2)';">Подробнее</a>
											</div>
									</div>`,
						balloonContentFooter: `<div style="font-size: 12px; color: #999; margin-top: 10px;">Дата: ${card.event_date}</div>`,
						hintContent: `<div style="font-size: 14px; color: #333;">${card.event_date}</div>`,
					},
					{
						balloonContentLayout: ymaps.templateLayoutFactory.createClass(`
									<div style="padding: 10px; background-color: #fff; border: 1px solid #ddd; border-radius: 5px;">
											<div class="balloon-header" style="font-size: 16px; font-weight: bold; color: #333;">$[properties.balloonContentHeader]</div>
											<div class="balloon-body" style="font-size: 14px; color: #666; margin-top: 5px;">
													$[properties.balloonContentBody]
											</div>
											<div class="balloon-footer" style="font-size: 12px; color: #999; margin-top: 10px;">
													$[properties.balloonContentFooter]
											</div>
									</div>
							`),
					}
				);
				myMap.geoObjects.add(myPlacemark);
			});
		})
		.catch(error => {
			console.error('Ошибка при получении данных:', error);
		});
}
