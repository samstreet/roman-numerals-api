# Roman Numerals API Tech Test
This is an example repository of a roman numerals API

## Directory Structure
The repo is split up into the following diretories:

- .docs: a directory for any relevant documentation.
- .docker: this houses all the docker contextual files for the running of the application(s). This could house future docker specific things for deployments.
- .vscode: this directory is optional and wouldn't normally be committed, but I like the consistency of some settings that I have found in VS Code, usually a keen PHPStorm user.
- packages: this houses the actual application, included in this test is a `roman-numerals-api`, `roman-numerals-frontend`, `roman-numerals-api-docs` and `roman-numerals-other-service`
- .github: the location of any workflow specific things for GH actions

## Running The application
Running the application is simple:

- `cp .env.example .env`
- Add the following items to the newly made .env
    - DB_USERNAME=root
    - DB_PASSWORD=secret
    - DB_HOST=host.docker.internal
    - DB_PORT=3306
    - DB_DATABASE=default  
- `cd .docker`
- `docker-compose up -d`
- You can either now use Docker Desktop to execute commands or find the relevant docker container id to run commands
    - For Docker Desktop
        - To install the composer packages, open Docker Desktop, select the PHP container, navigate to exec and run `composer install`
        - Generate a new APP_KEY inside the exec tab `php artisan key:generate`
        - Run the migrations in the exec tab `php artisan migrate`
        - Run the seeder in the exec tab `php artisan db:seed`
    - For a CLI approach
        - Open a terminal
        - run `docker ps` and find the PHP container or alternatively use `docker ps -aqf "name=docker-php"` on a mac you can also do `pbcopy < docker ps -aqf "name=docker-php`
        - Using the id of the container run the following command `docker exec {YOUR CONTAINER ID} composer install`
        - Using the above approach generate a new APP_KEY `docker exec {YOUR CONTAINER ID} php artisan key:generate`
        - Using the above approach run the migrations `docker exec {YOUR CONTAINER ID} php artisan migrate`
        - Using the above approach run the seeder `docker exec {YOUR CONTAINER ID} php artisan db:seed`
- Navigate to `http://localhost/` to see the application

## Calling the endpoints
Utilise Postman/Paw/other to call the endpoints.

### Convert an integer to a numeral
Open up Postman/Paw/Other and import the following as a new request:
```bash
curl --location 'http://localhost/v1/convert-integer-to-numeral' \
--header 'Accept: application/json, text/plain, */*' \
--header 'Accept-Language: en-GB,en-US;q=0.9,en;q=0.8' \
--header 'Connection: keep-alive' \
--header 'Content-Type: application/json' \
--header 'Origin: http://localhost:8000' \
--header 'Referer: http://localhost:8000/' \
--header 'Sec-Fetch-Dest: empty' \
--header 'Sec-Fetch-Mode: cors' \
--header 'Sec-Fetch-Site: same-site' \
--header 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36' \
--header 'sec-ch-ua: "Not/A)Brand";v="8", "Chromium";v="126", "Google Chrome";v="126"' \
--header 'sec-ch-ua-mobile: ?0' \
--header 'sec-ch-ua-platform: "Windows"' \
--data '{
    "integer": 123
}'
```
Click send and await a result.

### Get the most recent conversions
Open up Postman/Paw/Other and import the following as a new request:
```bash
curl --location 'http://localhost/v1/statistics/most-recent' \
--header 'Accept: application/json, text/plain, */*' \
--header 'Accept-Language: en-GB,en-US;q=0.9,en;q=0.8' \
--header 'Connection: keep-alive' \
--header 'Content-Type: application/json' \
--header 'Origin: http://localhost:8000' \
--header 'Referer: http://localhost:8000/' \
--header 'Sec-Fetch-Dest: empty' \
--header 'Sec-Fetch-Mode: cors' \
--header 'Sec-Fetch-Site: same-site' \
--header 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36' \
--header 'sec-ch-ua: "Not/A)Brand";v="8", "Chromium";v="126", "Google Chrome";v="126"' \
--header 'sec-ch-ua-mobile: ?0' \
--header 'sec-ch-ua-platform: "Windows"'
```

Click send and await a result.

### Get the most popular conversions
Open up Postman/Paw/Other and import the following as a new request:
```bash
curl --location 'http://localhost/v1/statistics/most-popular' \
--header 'Accept: application/json, text/plain, */*' \
--header 'Accept-Language: en-GB,en-US;q=0.9,en;q=0.8' \
--header 'Connection: keep-alive' \
--header 'Content-Type: application/json' \
--header 'Origin: http://localhost:8000' \
--header 'Referer: http://localhost:8000/' \
--header 'Sec-Fetch-Dest: empty' \
--header 'Sec-Fetch-Mode: cors' \
--header 'Sec-Fetch-Site: same-site' \
--header 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36' \
--header 'sec-ch-ua: "Not/A)Brand";v="8", "Chromium";v="126", "Google Chrome";v="126"' \
--header 'sec-ch-ua-mobile: ?0' \
--header 'sec-ch-ua-platform: "Windows"'
```
Click send and await a result.
## Running tests
- For Docker Desktop
  - Open Docker Desktop, select the PHP container, navigate to exec and run `php artisan test`
    - For a CLI approach
        - Open a terminal
        - Run `docker ps` and find the PHP container or alternatively use `docker ps -aqf "name=docker-php"` on a mac you can also do `pbcopy < docker ps -aqf "name=docker-php`
        - Using the id of the container run the following command `docker exec {YOUR CONTAINER ID} php artisan test`

## Future considerations
- Auth would be added via a JWT implementation or the use of Passport
- Would have used Redis for caching but seemed out of scope so stuck with file cache
- Could have optimised the database queries and used indexes, seemed out of scope for this test
- Added more test coverage for API endpoints
- Added BDD tests if there was a front end
- Would have expanded the Writerside documentation, way out of scope for this test