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

## Configuration

- Rename the `.env.example` file to `.env` and configure your database settings.
- Generate an application key: `php artisan key:generate`
- Run database migrations: `php artisan migrate`

## Usage

To start the development server, run:

```bash
php artisan serve
```

Visit `http://127.0.0.1:8000/graphiql` in your browser to access the GraphQL Playground. Here, you can explore the available queries and mutations, and interact with the API.

## GraphQL Schema

The GraphQL schema for NewsLaravelGraphQL defines the types, queries, and mutations that the API supports. You can find the schema definition in the graphql directory of the project.

| Type     | Name               | Description                                   | Example                                                                                          |
| -------- | ------------------ | --------------------------------------------- | ------------------------------------------------------------------------------------------------ |
| Query    | `articles`         | Retrieve a list of news articles.            | `articles { id, title, content, category { id, name } }`                                          |
| Query    | `article`          | Retrieve a specific news article by ID.      | `article(id: 123) { id, title, content, category { id, name } }`                                  |
| Mutation | `createArticle`    | Create a new news article.                   | `createArticle(input: { title: "New Article", content: "Content here", categoryId: 1 }) { id }` |
| Mutation | `updateArticle`    | Update an existing news article by ID.       | `updateArticle(id: 123, input: { title: "Updated Title" }) { id, title }`                         |
| Mutation | `deleteArticle`    | Delete a news article by ID.                 | `deleteArticle(id: 123)`                                                                        |
| Query    | `categories`       | Retrieve a list of news categories.          | `categories { id, name }`                                                                        |
| Query    | `category`         | Retrieve a specific news category by ID.     | `category(id: 1) { id, name }`                                                                    |
| Mutation | `createCategory`   | Create a new news category.                  | `createCategory(input: { name: "Technology" }) { id }`                                          |
| Mutation | `updateCategory`   | Update an existing news category by ID.      | `updateCategory(id: 1, input: { name: "Updated Category" }) { id, name }`                        |
| Mutation | `deleteCategory`   | Delete a news category by ID.                | `deleteCategory(id: 1)`                                                                          |
| Query    | `authors`          | Retrieve a list of news authors.             | `authors { id, name }`                                                                            |
| Query    | `author`           | Retrieve a specific news author by ID.       | `author(id: 1) { id, name }`                                                                      |
| Mutation | `createAuthor`     | Create a new news author.                   | `createAuthor(input: { name: "John Doe" }) { id }`                                               |
| Mutation | `updateAuthor`     | Update an existing news author by ID.       | `updateAuthor(id: 1, input: { name: "Updated Author" }) { id, name }`                             |
| Mutation | `deleteAuthor`     | Delete a news author by ID.                 | `deleteAuthor(id: 1)`                                                                            |
| Query    | `comments`         | Retrieve a list of comments for an article. | `comments(articleId: 123) { id, content }`                                                        |
| Mutation | `createComment`    | Create a new comment for an article.        | `createComment(input: { articleId: 123, content: "Great article!" }) { id }`                     |
| Mutation | `updateComment`    | Update an existing comment by ID.           | `updateComment(id: 456, input: { content: "Updated comment" }) { id, content }`                  |
| Mutation | `deleteComment`    | Delete a comment by ID.                     | `deleteComment(id: 456)`                                                                          |
| Query    | `searchArticles`   | Search for articles based on a query.       | `searchArticles(query: "GraphQL") { id, title }`                                                 |
| Query    | `searchAuthors`    | Search for authors based on a query.        | `searchAuthors(query: "Doe") { id, name }`                                                       |
| Query    | `searchCategories` | Search for categories based on a query.     | `searchCategories(query: "Tech") { id, name }`                                                   |
| Query    | `topArticles`      | Retrieve top-rated articles.                | `topArticles(limit: 5) { id, title, rating }`                                                     |
| Mutation | `rateArticle`      | Rate an article by ID.                      | `rateArticle(id: 123, rating: 4) { id, title, rating }`                                           |
| Query    | `recentArticles`   | Retrieve recent articles.                   | `recentArticles(limit: 10) { id, title, created_at }`                                            |
| Query    | `featuredArticles` | Retrieve featured articles.                 | `featuredArticles(limit: 3) { id, title, isFeatured }`                                            |
| Query    | `relatedArticles`  | Retrieve related articles for an article.   | `relatedArticles(articleId: 123, limit: 3) { id, title }`                                        |
| Query    | `popularAuthors`     | Retrieve popular authors based on ratings.      | `popularAuthors(limit: 5) { id, name, averageRating }`                                              |
| Query    | `mostCommented`      | Retrieve most commented articles.               | `mostCommented(limit: 3) { id, title, commentCount }`                                               |
| Mutation | `addBookmark`        | Add an article to user's bookmarks.             | `addBookmark(userId: 123, articleId: 456) { id, title, bookmarks { id, title } }`                 |
| Mutation | `removeBookmark`     | Remove an article from user's bookmarks.       | `removeBookmark(userId: 123, articleId: 456) { id, title, bookmarks { id, title } }`              |
| Query    | `userBookmarks`      | Retrieve a user's bookmarked articles.         | `userBookmarks(userId: 123) { id, title, bookmarks { id, title } }`                                |
| Query    | `articleBySlug`      | Retrieve an article by its slug.               | `articleBySlug(slug: "sample-article") { id, title, content, category { id, name } }`              |
| Query    | `userActivity`       | Retrieve recent activity for a user.           | `userActivity(userId: 123, limit: 5) { id, action, timestamp }`                                     |
| Mutation | `createUser`         | Create a new user.                             | `createUser(input: { username: "newuser", email: "user@example.com" }) { id, username }`           |
| Mutation | `updateUser`         | Update user details.                           | `updateUser(id: 123, input: { username: "updateduser" }) { id, username, email }`                   |
| Mutation | `deleteUser`         | Delete a user.                                 | `deleteUser(id: 123)`                                                                               |
| Mutation | `changePassword`     | Change user's password.                        | `changePassword(id: 123, newPassword: "newpass123") { id, username }`                              |
| Mutation | `resetPassword`      | Reset user's password.                         | `resetPassword(email: "user@example.com") { message }`                                              |
| Mutation | `requestArticleDeletion` | Request deletion of user's article.         | `requestArticleDeletion(userId: 123, articleId: 456) { id, title, status }`                        |
| Query    | `notifications`      | Retrieve user's notifications.                 | `notifications(userId: 123, limit: 10) { id, message, timestamp }`                                   |
| Mutation | `markAsRead`         | Mark a notification as read.                   | `markAsRead(userId: 123, notificationId: 789) { id, message, isRead }`                              |
| Mutation | `markAllAsRead`      | Mark all user's notifications as read.         | `markAllAsRead(userId: 123) { id, message, isRead }`                                                |
| Query    | `articleComments`    | Retrieve comments for a specific article.     | `articleComments(articleId: 456) { id, content, user { id, username } }`                             |
| Query    | `userComments`       | Retrieve comments by a specific user.         | `userComments(userId: 123) { id, content, article { id, title } }`                                  |
| Query    | `commentReplies`     | Retrieve replies for a specific comment.      | `commentReplies(commentId: 789) { id, content, user { id, username } }`                             |
| Query    | `userRoles`          | Retrieve roles for a specific user.           | `userRoles(userId: 123) { id, name }`                                                                |
| Mutation | `assignRole`         | Assign a role to a user.                      | `assignRole(userId: 123, roleId: 456) { id, name, users { id, username } }`                          |
| Mutation | `revokeRole`         | Revoke a role from a user.                    | `revokeRole(userId: 123, roleId: 456) { id, name, users { id, username } }`                          |
| Query    | `rolePermissions`    | Retrieve permissions for a specific role.     | `rolePermissions(roleId: 456) { id, name, permissions { id, action } }`                               |
| Mutation | `addPermission`      | Add a permission to a role.                   | `addPermission(roleId: 456, permissionId: 789) { id, name, permissions { id, action } }`             |
| Mutation | `removePermission`   | Remove a permission from a role.              | `removePermission(roleId: 456, permissionId: 789) { id, name, permissions { id, action } }`          |
| Query    | `userSubscriptions`  | Retrieve a user's subscribed topics.            | `userSubscriptions(userId: 123) { id, topic, subscribedAt }`                                      |
| Mutation | `subscribeToTopic`   | Subscribe a user to a topic.                   | `subscribeToTopic(userId: 123, topic: "Technology") { id, topic, subscribedAt }`                  |
| Mutation | `unsubscribeFromTopic`| Unsubscribe a user from a topic.               | `unsubscribeFromTopic(userId: 123, topic: "Technology") { id, topic, subscribedAt }`               |
| Query    | `topicSubscribers`   | Retrieve subscribers of a topic.               | `topicSubscribers(topic: "Technology") { id, username }`                                           |
| Query    | `userActivityLog`    | Retrieve user's activity log.                   | `userActivityLog(userId: 123, limit: 10) { id, activity, timestamp }`                              |
| Query    | `topicArticles`      | Retrieve articles for a specific topic.       | `topicArticles(topic: "Technology", limit: 5) { id, title, topic }`                                |
| Query    | `trendingTopics`     | Retrieve currently trending topics.            | `trendingTopics(limit: 5) { id, topic, trendingScore }`                                            |
| Mutation | `createTopic`        | Create a new topic.                           | `createTopic(name: "AI") { id, topic }`                                                              |
| Mutation | `updateTopic`        | Update topic details.                         | `updateTopic(id: 123, name: "Updated Topic") { id, topic }`                                         |
| Mutation | `deleteTopic`        | Delete a topic.                               | `deleteTopic(id: 123)`                                                                              |
| Query    | `topicArticlesCount` | Retrieve the article count for a topic.       | `topicArticlesCount(topic: "Science")`                                                              |
| Query    | `userActivitySummary`| Retrieve summary of user's activity.           | `userActivitySummary(userId: 123) { id, username, totalActions }`                                    |
| Query    | `popularTopics`      | Retrieve popular topics based on subscriptions.| `popularTopics(limit: 5) { id, topic, subscriptionCount }`                                           |
| Mutation | `createTag`          | Create a new article tag.                     | `createTag(name: "Tutorial") { id, name }`                                                           |
| Mutation | `updateTag`          | Update tag details.                           | `updateTag(id: 123, name: "Updated Tag") { id, name }`                                              |
| Mutation | `deleteTag`          | Delete a tag.                                 | `deleteTag(id: 123)`                                                                                |
| Query    | `taggedArticles`     | Retrieve articles with a specific tag.        | `taggedArticles(tagId: 456) { id, title, tags { id, name } }`                                       |
| Mutation | `addTagToArticle`    | Add a tag to an article.                      | `addTagToArticle(articleId: 123, tagId: 456) { id, title, tags { id, name } }`                     |
| Mutation | `removeTagFromArticle`| Remove a tag from an article.               | `removeTagFromArticle(articleId: 123, tagId: 456) { id, title, tags { id, name } }`                |
| Query    | `similarArticles`    | Retrieve articles similar to a specific one. | `similarArticles(articleId: 123, limit: 3) { id, title, similarityScore }`                           |
| Mutation | `createAdvertisement`| Create a new advertisement.                   | `createAdvertisement(input: { title: "New Ad", link: "https://example.com" }) { id }`              |
| Mutation | `updateAdvertisement`| Update advertisement details.                 | `updateAdvertisement(id: 123, input: { title: "Updated Ad" }) { id, title }`                        |
| Mutation | `deleteAdvertisement`| Delete an advertisement.                     | `deleteAdvertisement(id: 123)`                                                                      |
| Query    | `allAdvertisements` | Retrieve all advertisements.                   | `allAdvertisements { id, title, link }`                                                             |
| Query    | `featuredAd`        | Retrieve a featured advertisement.            | `featuredAd { id, title, link }`                                                                    |
| Query    | `randomAd`          | Retrieve a random advertisement.              | `randomAd { id, title, link }`                                                                      |
| Query    | `advertisement`     | Retrieve a specific advertisement by ID.      | `advertisement(id: 123) { id, title, link }`                                                        |
| Mutation | `clickAdvertisement`| Register a click on an advertisement.         | `clickAdvertisement(id: 123) { id, title, link, clicks }`                                          |
| Mutation | `impressionAdvertisement` | Record an impression of an advertisement. | `impressionAdvertisement(id: 123) { id, title, link, impressions }`                                |
| Query    | `popularArticles`   | Retrieve popular articles based on metrics.  | `popularArticles(limit: 5) { id, title, views, rating }`                                            |
| Query    | `highestRated`      | Retrieve articles with the highest ratings.  | `highestRated(limit: 3) { id, title, rating }`                                                      |
| Query    | `mostViewed`        | Retrieve most viewed articles.               | `mostViewed(limit: 5) { id, title, views }`                                                          |
| Query    | `userFavorites`     | Retrieve articles favorited by a user.       | `userFavorites(userId: 123) { id, title, favorites { id, title } }`                                 |
| Mutation | `favoriteArticle`   | Favorite an article for a user.              | `favoriteArticle(userId: 123, articleId: 456) { id, title, favorites { id, title } }`               |
| Mutation | `unfavoriteArticle` | Unfavorite an article for a user.            | `unfavoriteArticle(userId: 123, articleId: 456) { id, title, favorites { id, title } }`             |
| Query    | `featuredAuthor`    | Retrieve a featured author.                  | `featuredAuthor { id, name, bio }`                                                                   |
| Query    | `randomAuthor`      | Retrieve a random author.                    | `randomAuthor { id, name, bio }`                                                                     |
| Query    | `similarAuthors`    | Retrieve authors similar to a specific one. | `similarAuthors(authorId: 123, limit: 3) { id, name, similarityScore }`                              |
| Query    | `searchTags`        | Search for tags based on a query.            | `searchTags(query: "Tutorial") { id, name }`                                                        |
| Query    | `userTags`          | Retrieve tags favorited by a user.           | `userTags(userId: 123) { id, name, favorites { id, name } }`                                         |
| Mutation | `favoriteTag`       | Favorite a tag for a user.                  | `favoriteTag(userId: 123, tagId: 456) { id, name, favorites { id, name } }`                         |
| Mutation | `unfavoriteTag`     | Unfavorite a tag for a user.                | `unfavoriteTag(userId: 123, tagId: 456) { id, name, favorites { id, name } }`                       |
| Query    | `relatedTags`       | Retrieve related tags for a specific tag.   | `relatedTags(tagId: 789) { id, name, related { id, name } }`                                         |
| Query    | `articleTags`       | Retrieve tags for a specific article.       | `articleTags(articleId: 123) { id, name }`                                                           |
| Mutation | `createReview`      | Create a new review for an article.         | `createReview(input: { articleId: 123, content: "Great article!" }) { id }`                        |
| Mutation | `updateReview`      | Update an existing review by ID.            | `updateReview(id: 456, input: { content: "Updated review" }) { id, content }`                        |
| Mutation | `deleteReview`      | Delete a review by ID.                      | `deleteReview(id: 456)`                                                                              |
| Query    | `reviewsByArticle`    | Retrieve reviews for a specific article.      | `reviewsByArticle(articleId: 123) { id, content, user { id, username } }`                            |
| Query    | `userReviews`         | Retrieve reviews by a specific user.          | `userReviews(userId: 123) { id, content, article { id, title } }`                                    |
| Query    | `topReviewers`        | Retrieve top reviewers based on activity.     | `topReviewers(limit: 5) { id, username, reviewCount }`                                                |
| Query    | `userReviewStats`     | Retrieve review statistics for a user.       | `userReviewStats(userId: 123) { id, username, totalReviews, averageRating }`                          |
| Query    | `articleRatings`      | Retrieve ratings for a specific article.     | `articleRatings(articleId: 456) { id, rating, user { id, username } }`                                |
| Mutation | `rateArticle`         | Rate an article by a user.                  | `rateArticle(userId: 123, articleId: 456, rating: 4) { id, rating, user { id, username } }`           |
| Mutation | `updateArticleRating` | Update a user's rating for an article.      | `updateArticleRating(userId: 123, articleId: 456, newRating: 5) { id, rating, user { id, username } }` |
| Mutation | `deleteArticleRating` | Delete a user's rating for an article.      | `deleteArticleRating(userId: 123, articleId: 456) { id, rating, user { id, username } }`               |
| Query    | `articlesWithTag`     | Retrieve articles with a specific tag.      | `articlesWithTag(tagId: 789) { id, title, tags { id, name } }`                                        |
| Query    | `articlesByAuthor`    | Retrieve articles by a specific author.     | `articlesByAuthor(authorId: 123) { id, title, author { id, name } }`                                  |
| Query    | `articlesByCategory`  | Retrieve articles by a specific category.   | `articlesByCategory(categoryId: 456) { id, title, category { id, name } }`                            |
| Query    | `articlesByTopic`     | Retrieve articles by a specific topic.      | `articlesByTopic(topic: "Technology") { id, title, topics }`                                           |
| Query    | `articlesByTag`       | Retrieve articles by a specific tag.        | `articlesByTag(tagId: 789) { id, title, tags { id, name } }`                                           |
| Query    | `latestComments`      | Retrieve latest comments.                  | `latestComments(limit: 5) { id, content, created_at }`                                                |
| Query    | `topCommenters`       | Retrieve top commenters based on activity. | `topCommenters(limit: 5) { id, username, commentCount }`                                              |
| Query    | `userCommentStats`    | Retrieve comment statistics for a user.    | `userCommentStats(userId: 123) { id, username, totalComments, averageWords }`                          |
| Query    | `userRatingStats`     | Retrieve rating statistics for a user.     | `userRatingStats(userId: 123) { id, username, totalRatings, averageRating }`                            |
| Query    | `userBookmarkStats`   | Retrieve bookmark statistics for a user.   | `userBookmarkStats(userId: 123) { id, username, totalBookmarks, bookmarkedTopics }`                     |
| Query    | `userFavoriteStats`   | Retrieve favorite statistics for a user.   | `userFavoriteStats(userId: 123) { id, username, totalFavorites, favoriteTags }`                         |
| Query    | `userReviewStats`     | Retrieve review statistics for a user.    | `userReviewStats(userId: 123) { id, username, totalReviews, averageRating }`                            |

## Database Schema

### articles
- id: INTEGER (Primary Key)
- title: STRING
- content: TEXT
- author_id: INTEGER (Foreign Key references authors)
- category_id: INTEGER (Foreign Key references categories)
- created_at: TIMESTAMP
- updated_at: TIMESTAMP

### authors
- id: INTEGER (Primary Key)
- name: STRING
- bio: TEXT
- created_at: TIMESTAMP
- updated_at: TIMESTAMP

### categories
- id: INTEGER (Primary Key)
- name: STRING
- created_at: TIMESTAMP
- updated_at: TIMESTAMP

### comments
- id: INTEGER (Primary Key)
- content: TEXT
- user_id: INTEGER (Foreign Key references users)
- article_id: INTEGER (Foreign Key references articles)
- created_at: TIMESTAMP
- updated_at: TIMESTAMP

### tags
- id: INTEGER (Primary Key)
- name: STRING
- created_at: TIMESTAMP
- updated_at: TIMESTAMP

### article_tag
- article_id: INTEGER (Foreign Key references articles)
- tag_id: INTEGER (Foreign Key references tags)

### ratings
- id: INTEGER (Primary Key)
- user_id: INTEGER (Foreign Key references users)
- article_id: INTEGER (Foreign Key references articles)
- rating: FLOAT
- created_at: TIMESTAMP
- updated_at: TIMESTAMP

### bookmarks
- id: INTEGER (Primary Key)
- user_id: INTEGER (Foreign Key references users)
- article_id: INTEGER (Foreign Key references articles)
- created_at: TIMESTAMP
- updated_at: TIMESTAMP

### reviews
- id: INTEGER (Primary Key)
- content: TEXT
- user_id: INTEGER (Foreign Key references users)
- article_id: INTEGER (Foreign Key references articles)
- rating: FLOAT
- created_at: TIMESTAMP
- updated_at: TIMESTAMP

### advertisements
- id: INTEGER (Primary Key)
- title: STRING
- link: STRING
- clicks: INTEGER
- impressions: INTEGER
- created_at: TIMESTAMP
- updated_at: TIMESTAMP

And many more...

## Examples:

![Screenshot from 2023-08-17 17-19-58](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/55da716d-ae3c-45fd-9151-896b90ccc13b)

![Screenshot from 2023-08-17 17-20-30](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/55b8487f-759a-411e-acb9-e7501f6136c1)

![Screenshot from 2023-08-17 17-23-16](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/40bc0dff-2543-402b-baf8-32777b9098a6)

![Screenshot from 2023-08-17 17-24-17](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/6f18964e-594b-4394-a776-ffbb06fd2715)

![Screenshot from 2023-08-17 17-26-59](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/86590a9e-d615-44fb-8085-7b39ba7a58f5)

![Screenshot from 2023-08-17 17-33-48](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/85a40ec1-13d7-4d14-a9bd-28eb0611e5ca)

![Screenshot from 2023-08-17 17-59-27](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/cb9191b3-dbe4-44a5-9c5b-dd5da1b1a71e)

![Screenshot from 2023-08-17 18-00-27](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/3d01466f-0277-4531-879b-9033567c1c2b)

![Screenshot from 2023-08-17 18-02-34](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/d29bc561-0421-4281-8fa1-2c1d598c8024)

![Screenshot from 2023-08-17 18-02-47](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/7451f8ab-83b5-49b6-ac62-e92359eea8f5)

![Screenshot from 2023-08-17 18-04-27](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/bac1e47e-d900-4679-a68e-8cc07986197b)

![Screenshot from 2023-08-17 18-06-26](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/2a38feee-ae8e-4567-af0d-23b86287b4b9)

![Screenshot from 2023-08-17 18-14-09](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/9abbc642-28f1-4d58-8db4-612af9aa8d27)

![Screenshot from 2023-08-17 18-17-21](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/9c5da0e4-4d9b-4561-b05d-fa4bc2e5f928)

![Screenshot from 2023-08-17 18-19-41](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/53e09330-3c98-476d-a28d-a726b3701dd0)

![Screenshot from 2023-08-17 18-35-47](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/b2b9c0b7-01d4-4270-bc7f-5cb7dac6a09b)

![Screenshot from 2023-08-17 18-42-54](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/f6835f42-d583-4046-8340-7ec03f9c20c4)

![Screenshot from 2023-08-17 18-43-28](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/5a072846-cc28-45c9-8ad0-9d603901bd98)

![Screenshot from 2023-08-17 19-59-27](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/88979f90-2364-4a63-ba31-ee88465ca014)

![Screenshot from 2023-08-17 20-00-19](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/621a1a4d-cbf9-4824-97cc-eedc13e9dece)

![Screenshot from 2023-08-17 20-00-30](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/cc2ad1b3-02cf-4efa-837b-f7faf2c521bc)

![Screenshot from 2023-08-17 20-05-25](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/eb5b1c6b-5d89-45b7-bf3a-9ce5564b8bc2)

![Screenshot from 2023-08-17 20-05-35](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/f4dc2b0a-2dd8-4f46-a764-02fe76796607)

![Screenshot from 2023-08-17 20-06-01](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/a5e65cce-8baa-4ea3-90be-29d17db3fd38)

![Screenshot from 2023-08-17 20-09-24](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/2735c233-b2f0-4fa0-8479-b132a23de1c4)

![Screenshot from 2023-08-17 20-20-33](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/e26ab53e-3a28-4782-af74-11dda186e19d)

![Screenshot from 2023-08-17 20-26-47](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/de7ba3b1-3b1c-40ca-b042-26cf8319e226)

![Screenshot from 2023-08-17 20-27-25](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/076f072d-89c9-4411-8806-5bbc39b0a4d9)

![Screenshot from 2023-08-17 20-31-33](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/d82a2072-0140-4807-8513-688bfed88f57)

![Screenshot from 2023-08-17 20-31-40](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/4c0b2a18-e09c-40df-8fbf-21d6f681db80)

![Screenshot from 2023-08-17 20-43-16](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/ba2d6cbc-3622-4fbe-8bb2-fc1d2404f33f)

![Screenshot from 2023-08-17 20-44-00](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/a6417dca-f85f-4469-9d85-ba6c7aebc137)

![Screenshot from 2023-08-17 20-53-15](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/7993ae58-9e7a-4c39-be2d-304f223547ec)

![Screenshot from 2023-08-17 20-54-51](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/080b71cd-9c58-458b-9500-7ded17d63b6d)

![Screenshot from 2023-08-17 20-59-55](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/2728fb86-2eef-4d35-b23e-fa520935806a)

![Screenshot from 2023-08-17 21-02-58](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/63c668d2-b962-47f8-a2f8-0611239ac246)


## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvements, please feel free to open an issue or submit a pull request. See CONTRIBUTING.md for more information.

## License

This project is licensed under the GPL-3.0 License.

Copyright 2023, Max Base
