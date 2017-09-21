<?php declare(strict_types=1);

namespace Shopware\Framework\Event;

class EmotionCategoriesWrittenEvent extends NestedEvent
{
    const NAME = 'emotion_categories.written';

    /**
     * @var string[]
     */
    private $emotionCategoriesUuids;

    /**
     * @var NestedEventCollection
     */
    private $events;

    /**
     * @var array
     */
    private $errors;

    public function __construct(array $emotionCategoriesUuids, array $errors = [])
    {
        $this->emotionCategoriesUuids = $emotionCategoriesUuids;
        $this->events = new NestedEventCollection();
        $this->errors = $errors;
    }

    public function getName(): string
    {
        return self::NAME;
    }

    /**
     * @return string[]
     */
    public function getEmotionCategoriesUuids(): array
    {
        return $this->emotionCategoriesUuids;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function hasErrors(): bool
    {
        return count($this->errors) > 0;
    }

    public function addEvent(NestedEvent $event): void
    {
        $this->events->add($event);
    }

    public function getEvents(): NestedEventCollection
    {
        return $this->events;
    }
}