<?php

namespace luya\web\jsonld;

/**
 * JsonLd - Social Media Posting
 *
 * A post to a social media platform, including blog posts, tweets, Facebook posts, etc.
 *
 *
 * @since 1.0.1
 */
class SocialMediaPosting extends BaseThing implements SocialMediaPostingInterface
{
    /**
     * @inheritdoc
     */
    public function typeDefintion()
    {
        return 'SocialMediaPosting';
    }

    use SocialMediaPostingTrait;
}
