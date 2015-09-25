setup:

composer install

for api call:

/api/article/{id} GET
/api/article/{id}/vote POST
/api/article/{id}/comment POST

for notify:

php app/console article:send-notification