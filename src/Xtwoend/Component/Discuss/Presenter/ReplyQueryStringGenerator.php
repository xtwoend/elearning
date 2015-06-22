<?php 

namespace Xtwoend\Component\Discuss\Presenter;

class ReplyQueryStringGenerator
{
    public function generate($reply, $perPage = 20)
    {
        $precedingReplyCount = $reply->getPrecedingReplyCount();
        $pageNumber = $this->getPageNumber($precedingReplyCount, $perPage);

        return "?page={$pageNumber}#reply-{$reply->id}";
    }

    private function getPageNumber($count, $perPage)
    {
        return floor($count / $perPage) + 1;
    }
}
