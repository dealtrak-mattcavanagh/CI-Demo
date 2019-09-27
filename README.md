# Hello to DealTrak's CI test application!

This repo exists to test proof of concept CI testing and pipeline demos.

# Running tests

We use the following tools for running tests:

* PHPSpec
* Behat

# Running PHPSpec

You can run PHPSpec directly via `php vendor/bin/phpspec run` when you're within the `app` directory.

If you wish to have code coverage, you will need to do a few extra steps:

1. Run the container with `docker-compose up`
2. Get into the terminal of the container via `docker exec -it cidemo-php bash`
3. Run `php vendor/bin/phpspec run -c phpspec-cc.yml`
4. In your browser, navigate to `file:///home/<<YOU>>/code/CI-Demo/app/coverage/index.html`
