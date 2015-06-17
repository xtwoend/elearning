<?php 

namespace Xtwoend\Component\Calendar\Events;

use DateTime;

interface Event
{
    /**
     * Get the event's title
     *
     * @return string
     */
    public function getTitle();

    /**
     * Is it an all day event?
     *
     * @return bool
     */
    public function isAllDay();

    /**
     * Get the start time
     *
     * @return DateTime
     */
    public function getStart();

    /**
     * Get the end time
     *
     * @return DateTime
     */
    public function getEnd();

    /**
     * Get url link
     * @return string
     */
    public function getUrl();

}