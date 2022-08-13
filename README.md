# project-course
Пример Аутентификации:
![изображение](https://user-images.githubusercontent.com/79931339/184496995-815ac04b-07ea-4d3c-855b-8b1ed6c512a5.png)
Создадим клиента аунтефикации локально (то есть через команды сервера)
Потом введем в строку в браузере данный URL:
http://localhost:8000/oauth/authorize?client_id=1redirect_uri=http://localhost:8000/callback&response_type=code&scope=&state=1
Указав этим что мы хотим получить  код доступа 
После этого нас переносят на страницу Входа пользователям
Вводим логин и пароль перед этим созданного пользователя 

![изображение](https://user-images.githubusercontent.com/79931339/184497349-ce6b9910-a78c-4b2e-84fb-f27c754002d6.png)

И теперь вводим URL еще раз

![изображение](https://user-images.githubusercontent.com/79931339/184497423-d5a64db5-038c-47ba-8cb8-1b3a6cef572a.png)

Нам выводается предложение  получить токен доступа через клиента  TestForReadmeGitHub.
Мы соглашаемся
![изображение](https://user-images.githubusercontent.com/79931339/184497518-beb86e00-4dec-4bf8-9062-80795ed8492c.png)
Нам выдается страница 404 , но в URL нам дают код доступа, мы его записываем
 
Теперь через  POSTMan делает пост запрос на url http://localhost:8000/oauth/token c телом Как на картинке только заменяя
id и секретный ключ и code авторизации на свои и делает запрос
![изображение](https://user-images.githubusercontent.com/79931339/184497608-85b82100-c104-4529-aae4-042e0df9a764.png)
Ответ приходит такой где выдается Код доступа для Нашего пользователя unsualusername
![изображение](https://user-images.githubusercontent.com/79931339/184497680-a02a153f-fc92-4df1-9976-84bc629b1504.png)

Теперь при каждом Запросе  который требует авторизованного пользователя мы в тело запроса вбиваем
ключ Authorization и значеним "Bearer 'Ваш код доступа'" 
Например добавим в избранное обьект и получим его
Добавление в фаворитку
![изображение](https://user-images.githubusercontent.com/79931339/184497817-d87bdaa7-260c-41d7-b678-799c7e846e9b.png)

Получение фаворитки для определенного пользователя
![изображение](https://user-images.githubusercontent.com/79931339/184497872-9859d202-d58c-45fc-b081-f2952c8b0d61.png)




