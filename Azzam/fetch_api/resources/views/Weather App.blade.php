<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
</head>
<body>
    <h1>Weather Forecast</h1>
    <input type="text" id="city" placeholder="Enter city name" />
    <button onclick="getWeather()">Get Weather</button>
    <div id="result"></div>

    <script>
        async function getWeather() {
            const city = document.getElementById('city').value;
            const response = await fetch(`http://localhost:8000/api/weather?city=${city}`);
            const data = await response.json();

            const resultDiv = document.getElementById('result');
            if (response.ok) {
                resultDiv.innerHTML = `
                    <h3>Weather in ${data.name}</h3>
                    <p>Temperature: ${data.main.temp}°C</p>
                    <p>Condition: ${data.weather[0].description}</p>
                `;
            } else {
                resultDiv.innerHTML = `<p>${data.error}</p>`;
            }
        }
    </script>
</body>
</html>