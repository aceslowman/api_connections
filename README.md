# api_connections
Collection of PHP scripts for accessing APIs and broadcasting them using UDP and OSC

* Twitter Stream API
* Twitter Search API
* NYT API
* RSS Feeds

To use any of these, first fill out the .env file with the relevant API keys.

## Twitter Stream API

This was adapted from a collection of scripts from https://github.com/tkzic/internet-sensors, which also includes work from Mike Pultz.

To use this, go to Terminal, navigate to this folder, and enter:

```
php osc-twitter-api_run.php search_term
```

You can enter a list of search terms separated by spaces, make sure that you wrap any searches containing spaces in quotation marks:

```
php osc-twitter-api_run.php search_term "Search Term" 
```

## NYT API
