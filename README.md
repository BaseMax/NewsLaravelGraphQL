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

## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvements, please feel free to open an issue or submit a pull request. See CONTRIBUTING.md for more information.

## License

This project is licensed under the GPL-3.0 License.

Copyright 2023, Max Base
