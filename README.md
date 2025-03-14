# JoomShopping 5 и YOOtheme Pro (Joomla 4)
Темплейт магазина JoomShopping (Joomla), адаптированный для конструктора YOOtheme Pro. В качестве **основы** был использован стандартный темплейт JoomShopping.

--> Шаблон магазина для JoomShopping-5 (**Joomla 5**) доступен по ссылке: [**shop.generalov.net**](https://shop.generalov.net/joomshopping/joomshooping-yootheme-template)
## Содержание
### com_jshopping
Все файлы темплейта переписаны с использованием стилей и модулей YOOtheme Pro:
> - card
> - category
> - checkout
> - manufacturer
> - order
> - product
> - search
> - user
> - vendor
### custom.css
Дополнительные стили для магазина. Без них не удалось “аккуратно” интегрировать некоторые элементы магазина в конструктор YOOtheme. Размешается этот файл, согласно документации YOOtheme, в папке **templates/yootheme_CHILD/css/**
### ru-RU.com_jshopping.ini
Дополнения для языкового файла Joomshopping 5. Размешается этот файл в папке **language/ru-RU/**
## Установка
1. У вас уже должен быть установлен компонент магазина [**JoomShopping**](https://www.webdesigner-profi.de/joomla-webdesign/joomla-shop/downloads)
2. У вас, в Joomla 4, должен быть установлен конструктор [**YOOtheme Pro**](https://yootheme.com/page-builder)
3. Создайте в папке Templates свой темплейт **yootheme_CHILD** (имя дочернего темплейта может быть любое, но необходимо придерживаться правила для YOOtheme-конструктора):
>     templates/yootheme_CHILD/
4. Внутри **yootheme_CHILD** добавьте папку **html**:
>     templates/yootheme_CHILD/html/
5. Скопируйте в  папку **html** папку **com_jshopping** со всем её содержимым.
6. В настройках стиля **YOOtheme** (Settings/Advanced/ChildTheme) укажите, что хотите использовать свою тему **yootheme_CHILD**.
## Использование
JoomShopping автоматически будет использовать новый темплейт.
