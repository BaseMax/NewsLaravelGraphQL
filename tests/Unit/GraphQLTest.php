<?php

namespace Tests\Unit;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use Symfony\Component\VarDumper\VarDumper;

class GraphQLTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_get_articles(): void
    {
        $client = new Client(["base_uri" => "http://127.0.0.1:8000/graphql"]);

        $response = $client->post('', [
            "json" => [
                "query" => "{
                    articles {
                        id
                        title
                        content
                        category {
                            id
                            name
                            created_at
                            updated_at
                        }
                    }
                }"
            ]
        ]);

        $data = json_decode($response->getBody(), true);
        $this->assertArrayHasKey("data", $data);
        $this->assertArrayHasKey("articles", $data["data"]);
    }

    public function test_get_one_article(): void
    {
        $client = new Client(["base_uri" => "http://127.0.0.1:8000/graphql"]);

        $response = $client->post('', [
            "json" => [
                "query" => "{
                    article(id: 1) {
                        author {
                            name
                            bio
                            created_at
                            updated_at
                            articles {
                                title
                                content
                                created_at
                                updated_at
                            }
                        }
                        id
                        created_at
                        updated_at
                    }
                }"
            ]
        ]);

        $data = json_decode($response->getBody(), true);
        $this->assertArrayHasKey("data", $data);
        $this->assertArrayNotHasKey("errors", $data);
        $this->assertArrayHasKey("article", $data["data"]);
        $this->assertArrayHasKey("author", $data["data"]["article"]);
    }

    public function test_get_categories(): void
    {
        $client = new Client(["base_uri" => "http://127.0.0.1:8000/graphql"]);

        $response = $client->post('', [
            "json" => [
                "query" => "{
                    categories {
                        id
                        name
                        created_at
                        updated_at
                        articles {
                            id
                            created_at
                            updated_at
                            title
                            content
                        }
                    }
                }"
            ]
        ]);

        $data = json_decode($response->getBody(), true);
        $this->assertArrayHasKey("data", $data);
        $this->assertArrayNotHasKey("errors", $data);
        $this->assertArrayHasKey("categories", $data["data"]);
        $this->assertArrayHasKey("articles", $data["data"]["categories"][0]);
    }
}
