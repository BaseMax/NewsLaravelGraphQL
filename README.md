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
| Query    | `topicArticles`      | Retrieve articles for a specific topic.       | `topicArticles(topic: "Technology", limit: 5) { id, title, topic }`                                |
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

![Screenshot from 2023-08-17 17-19-58](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/5ccdc1a7-24c7-4f28-b389-a3fafab76d73)

![Screenshot from 2023-08-17 17-20-30](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/c9997360-751c-4c34-b8f3-988137578b30)

![Screenshot from 2023-08-17 17-23-16](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/53d00ddf-444f-4b0c-969a-822618766b6a)

![Screenshot from 2023-08-17 17-24-17](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/d06d053c-5347-4d25-91d0-a8da079fc752)

![Screenshot from 2023-08-17 17-26-59](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/2e792a31-a7cd-4f29-b174-413a42dabf1a)

![Screenshot from 2023-08-17 17-33-48](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/b449eafc-beb8-41ab-b84b-83b2058a0ae9)

![Screenshot from 2023-08-17 17-59-27](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/5c55fa45-6929-4093-82f4-21d0aeb11238)

![Screenshot from 2023-08-17 18-00-27](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/3dcbfe2e-dc08-4958-a852-13a2e61fef29)

![Screenshot from 2023-08-17 18-02-34](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/adb14991-71b5-410d-9266-40e77e4546ae)

![Screenshot from 2023-08-17 18-02-47](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/849592f8-8e4a-43ae-9eed-585679e6bf70)

![Screenshot from 2023-08-17 18-04-27](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/6cc08ca5-4e50-4a7d-9571-cd3eec501771)

![Screenshot from 2023-08-17 18-06-26](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/67401368-7e2c-4477-a4a7-af6c6d376339)

![Screenshot from 2023-08-17 18-14-09](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/122d096b-ccf4-4a86-b5d7-ef90adcf515b)

![Screenshot from 2023-08-17 18-17-21](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/883ee567-8625-4f2d-9424-5e37f4889dee)

![Screenshot from 2023-08-17 18-19-41](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/0ef09f53-88fe-4b9b-9189-30beeda08892)

![Screenshot from 2023-08-17 18-35-47](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/a21860c8-341a-41b6-b7a6-02c3d8dcbaf4)

![Screenshot from 2023-08-17 18-42-54](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/7bb6ebd5-19f3-4ae0-91dc-099cd52d0bd2)

![Screenshot from 2023-08-17 18-43-28](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/18ee3088-f9e4-4f18-8b1f-75b4931224eb)

![Screenshot from 2023-08-17 19-59-27](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/72740335-f2b1-4b65-b193-06b418903086)

![Screenshot from 2023-08-17 20-00-19](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/44683522-c32f-414f-a2ba-d0f8e42107a9)

![Screenshot from 2023-08-17 20-00-30](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/d8f5b226-77a6-45c2-ace9-ee28835715b1)

![Screenshot from 2023-08-17 20-05-25](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/3cc480d2-0ef3-412d-8024-87429da17f63)

![Screenshot from 2023-08-17 20-05-35](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/41110edf-5a68-42c1-9136-6178e935c207)

![Screenshot from 2023-08-17 20-06-01](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/0874e81c-da2c-42bf-9987-5fe84c585dae)

![Screenshot from 2023-08-17 20-09-24](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/7e29e37c-4288-473a-a8b4-cd4243c8f692)

![Screenshot from 2023-08-17 20-20-33](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/b5bc067b-ee37-4880-83c5-ae96a67e89a1)

![Screenshot from 2023-08-17 20-26-47](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/955e6627-0f3e-4f0c-8431-d28bffa2d45c)

![Screenshot from 2023-08-17 20-27-25](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/3756feff-e419-4dc8-97fb-136e66232560)

![Screenshot from 2023-08-17 20-31-33](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/d1034074-03fc-4564-abfe-3183a2d125b3)

![Screenshot from 2023-08-17 20-31-40](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/15c81941-2eb6-43f6-afa0-45ae8d95a0ef)

![Screenshot from 2023-08-17 20-43-16](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/e8c410dc-516e-4112-aa41-ebf331b382d1)

![Screenshot from 2023-08-17 20-44-00](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/a1126f36-5452-48f2-9bcc-fbc1c7b3be61)

![Screenshot from 2023-08-17 20-53-15](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/08cf12f6-b7bd-4be0-bdc2-0f0053367e51)

![Screenshot from 2023-08-17 20-54-51](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/369b8304-6fac-4b8f-8e3c-47c2ca4b6426)

![Screenshot from 2023-08-17 20-59-55](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/61125d36-0c60-444d-8cf5-aa0a7080d988)

![Screenshot from 2023-08-17 21-02-58](https://github.com/BaseMax/NewsLaravelGraphQL/assets/107758775/1bdb8873-142a-493f-899f-361e96e11790)

## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvements, please feel free to open an issue or submit a pull request. See CONTRIBUTING.md for more information.

## License

This project is licensed under the GPL-3.0 License.

Copyright 2023, Max Base
