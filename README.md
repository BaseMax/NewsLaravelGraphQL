# News Laravel GraphQL PHP

NewsLaravelGraphQL is a Laravel-based web service that leverages the power of GraphQL to provide a flexible and efficient API for accessing news articles and related information. This project is built on Laravel version 10 and utilizes PHP 8.2, ensuring modern and robust development practices.

## Introduction

NewsLaravelGraphQL provides an alternative approach to creating a web service for news-related content. Unlike traditional RESTful APIs, it utilizes GraphQL, a query language for APIs, which allows clients to request exactly the data they need and nothing more. This can lead to reduced over-fetching and under-fetching of data, resulting in better performance and a more efficient development process.

## Features

- GraphQL-based API for news articles.
- Efficient data retrieval with custom queries.
- Laravel version 10 and PHP 8.2 for a modern development stack.
- Easy installation and configuration process.

# Getting Started

Follow these steps to set up and run NewsLaravelGraphQL on your local machine.

**Prerequisites:**

Before you begin, ensure you have the following installed:

- PHP 8.2
- Composer
- MySQL or your preferred database system

**Installation:**

- Clone the repository: `git clone https://github.com/BaseMax/NewsLaravelGraphQL.git`
- Navigate to the project directory: `cd NewsLaravelGraphQL`
- Install PHP dependencies: `composer install`
- Install JavaScript dependencies: `npm install`

## Configuration

- Rename the `.env.example` file to `.env` and configure your database settings.
- Generate an application key: `php artisan key:generate`
- Run database migrations: `php artisan migrate`
- Seed the database with sample data: `php artisan db:seed`

## Usage

To start the development server, run:

```bash
php artisan serve
```

Visit `http://127.0.0.1:8000/graphql` in your browser to access the GraphQL Playground. Here, you can explore the available queries and mutations, and interact with the API.

## GraphQL Schema

The GraphQL schema for NewsLaravelGraphQL defines the types, queries, and mutations that the API supports. You can find the schema definition in the graphql directory of the project.

## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvements, please feel free to open an issue or submit a pull request. See CONTRIBUTING.md for more information.

## License

This project is licensed under the GPL-3.0 License.

Copyright 2023, Max Base
