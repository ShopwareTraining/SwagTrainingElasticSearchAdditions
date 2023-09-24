<?php declare(strict_types=1);

namespace SwagTraining\ElasticSearchAdditions\Elasticsearch;

use OpenSearchDSL\Query\Compound\BoolQuery;
use OpenSearchDSL\Query\FullText\MatchQuery;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Elasticsearch\Framework\AbstractElasticsearchDefinition;
use Shopware\Elasticsearch\Product\ElasticsearchProductDefinition;

class ElasticsearchProductDefinitionDecorator extends AbstractElasticsearchDefinition
{
    public function __construct(
        private ElasticsearchProductDefinition $originalObject
    ) {
    }

    public function getEntityDefinition(): EntityDefinition
    {
        return $this->originalObject->getEntityDefinition();
    }

    public function getMapping(Context $context): array
    {
        $mapping = $this->originalObject->getMapping($context);
        //$mapping['properties']['foobar'] = ElasticsearchProductDefinition::KEYWORD_FIELD;

        return $mapping;
    }

    public function fetch(array $ids, Context $context): array
    {
        $documents = $this->originalObject->fetch($ids, $context);
        //foreach ($documents as &$document) {
        //    $document['foobar'] = 'foobar2';
        //}

        return $documents;
    }

    public function buildTermQuery(Context $context, Criteria $criteria): BoolQuery
    {
        $bool = $this->originalObject->buildTermQuery($context, $criteria);

        $term = (string)$criteria->getTerm();
        //$bool->add(new MatchQuery('customFields.custom_product_example_field1', $term, ['boost' => 10]), BoolQuery::SHOULD);
        return $bool;
    }
}