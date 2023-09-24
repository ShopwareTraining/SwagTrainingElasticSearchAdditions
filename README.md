# SwagTrainingElasticSearchAdditions plugin

**Shopware plugin to illustrate how you can extend ElasticSearch data with your own plugin**

## Installation
```bash
bin/console plugin:install --activate SwagTrainingElasticSearchAdditions
bin/console es:reset -n
bin/console es:index
```

## Proof of concept
The service decorator in this plugin, adds a 

    http://localhost:9200/_search/?q=foobar2

http://es.pollux.yr:9200/_cat/indices
http://es.pollux.yr:9200/_cat/aliases
http://es.pollux.yr:9200/_mappings
http://es.pollux.yr:9200/sw_product_018a41daf3717349aba79d578a76700b/_search
