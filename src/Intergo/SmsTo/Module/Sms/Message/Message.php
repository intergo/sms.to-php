<?php


namespace Intergo\SmsTo\Module\Sms\Message;


class Message implements IMessage
{
    /**
     * @var string
     */
    public $senderID;

    /**
     * @var string
     */
    public $callbackURL;

    /**
     * @var string
     */
    public $scheduledFor;

    /**
     * @var string
     */
    public $timezone;

    /**
     * @return string
     */
    public function getSenderID(): string
    {
        return $this->senderID;
    }

    /**
     * @param string $senderID
     */
    public function setSenderID(string $senderID)
    {
        $this->senderID = $senderID;
        return $this;
    }

    /**
     * @return string
     */
    public function getCallbackURL(): string
    {
        return $this->callbackURL;
    }

    /**
     * @param string $callbackURL
     */
    public function setCallbackURL(string $callbackURL)
    {
        $this->callbackURL = $callbackURL;
        return $this;
    }

    /**
     * @return string
     */
    public function getScheduledFor(): string
    {
        return $this->scheduledFor;
    }

    /**
     * @param string $scheduledFor
     */
    public function setScheduledFor(string $scheduledFor)
    {
        $this->scheduledFor = $scheduledFor;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimezone(): string
    {
        return $this->timezone;
    }

    /**
     * @param string $timezone
     */
    public function setTimezone(string $timezone)
    {
        $this->timezone = $timezone;
        return $this;
    }

    /**
     * @return bool
     */
    public function isBypassOptout(): bool
    {
        return $this->bypassOptout;
    }

    /**
     * @param bool $bypassOptout
     */
    public function setBypassOptout(bool $bypassOptout)
    {
        $this->bypassOptout = $bypassOptout;
        return $this;
    }

    /**
     * @var bool
     */
    public $bypassOptout;

    function prepare(): array
    {
        return array_filter((array) $this, function ($val) {
            return !is_null($val) || (is_array($val) && !empty($val));
        });
    }
}