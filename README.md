# Intrader Utils

La siguiente es una librería que provee servicios relacionados al ambiente Intraders. Cuenta con los métodos listados a continuación, presentes en la clase OperacionesService:

1. **Market:** Provee precios de las criptomonedas y FIAT en base a otras monedas parametrizadas.
2. **Check:** En base al hash de una transacción cointrader y el supuesto monto de la misma, verifica que la misma exista y esté dirigida a la cuenta de la compañía.

# Uso

Simplemente debes instanciar la clase OperacionesService, que tiene un constructor sin argumentos y usar los métodos pasando los argumentos pertinentes.

```php
$service = new OperacionesService();

$res = $service->Market($currency, $order, $per_page, $page, $sparkline);
```