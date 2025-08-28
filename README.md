# imaginacms-isite


## Get Conversion Rates

- Add rates token in .env File

```
IMAGINA_RATES_TOKEN = "your_token_here"
```

- You can use the getConversionRates() method to fetch conversion rates. Here's a basic example:


```php
$result = getConversionRates();

if (isset($result['USDRates'])) {
    //You new code here
}
```

- Example Output

```
[
    "USDRates" => [
        "COP" => "4059.966484"
        "EUR" => "0.859028"
        // ...
    ]
]
```
