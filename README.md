# Silly PHP framework

Made to learn PHP. It's silly and have major errors (like hardcoded users and passwords)

## Usage

> [!IMPORTANT]
>
> - Create `.env` file with configuration in the `./app` directory. You can use `.env.example` file as a starting point. Just use `cp .env.example .env`.
> - *Optionally*[^1] export `UID` to expose the user id as an environmental variable by calling `export UID=${UID}`[^2].

Run the following command to compile and run the complete suite

```sh
docker compose build && docker compose up -d
```

[^1]: Default `UID`, set by the `.env` file will be used if this step is not performed.  
[^2]: This should be done even if there's an automatic Bash `UID` read only variable present since it is ignored by the docker.

## Based on

- [silly-damp](https://github.com/psugrg-web/silly-damp)
