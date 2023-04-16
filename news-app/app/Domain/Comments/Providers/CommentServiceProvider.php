<?php
namespace BTNewsApp\Domain\Comments\Providers;

use Illuminate\Support\ServiceProvider;
use BTNewsApp\Domain\Comments\Queries\StoreCommentQuery;
use BTNewsApp\Domain\Comments\Queries\DeleteCommentQuery;
use BTNewsApp\Domain\Comments\Queries\UpdateCommentQuery;
use BTNewsApp\Domain\Comments\Queries\GetCommentByIdQuery;
use BTNewsApp\Domain\Comments\Repositories\CommentRepository;
use BTNewsApp\Domain\Comments\Queries\GetCommentByNewsIdQuery;
use BTNewsApp\Infrastructure\Comments\Queries\StoreCommentQueryContract;
use BTNewsApp\Infrastructure\Comments\Queries\DeleteCommentQueryContract;
use BTNewsApp\Infrastructure\Comments\Queries\UpdateCommentQueryContract;
use BTNewsApp\Infrastructure\Comments\Queries\GetCommentByIdQueryContract;
use BTNewsApp\Infrastructure\Comments\Queries\GetCommentByNewsIdQueryContract;
use BTNewsApp\Infrastructure\Comments\Repositories\CommentRepositoryInterface;

class CommentServiceProvider extends ServiceProvider
{
    public $bindings = [
        CommentRepositoryInterface::class => CommentRepository::class,
        GetCommentByNewsIdQueryContract::class => GetCommentByNewsIdQuery::class,
        GetCommentByIdQueryContract::class => GetCommentByIdQuery::class,
        StoreCommentQueryContract::class => StoreCommentQuery::class,
        UpdateCommentQueryContract::class => UpdateCommentQuery::class,
        DeleteCommentQueryContract::class => DeleteCommentQuery::class,
    ];
}