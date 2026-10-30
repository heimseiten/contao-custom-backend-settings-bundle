<?php

declare(strict_types=1);

namespace Heimseiten\ContaoCustomBackendSettingsBundle\Event;

/**
 * Dispatched once per insert tag found in a record that is being edited in the
 * back end (option "Hint for insert tags"). Listeners can describe their own
 * tags: what the tag shows right now (value) and where it is maintained
 * (URL + link text). Core tags (link, insert_article, insert_content, …) are
 * pre-filled by the bundle and can be overridden.
 *
 * Example: {{kontakt::telefon}} → value "0221 123929", link to the record that
 * holds the phone number.
 */
final class InsertTagHintEvent
{
    private string|null $value = null;

    private string|null $url = null;

    private string|null $linkText = null;

    /**
     * @param list<string> $parameters
     */
    public function __construct(
        private readonly string $tag,
        private readonly string $name,
        private readonly array $parameters,
        private readonly string $table,
        private readonly array $record,
        private readonly int|null $rootPageId,
    ) {
    }

    /** The full tag without braces, e.g. "kontakt::telefon|strtoupper". */
    public function getTag(): string
    {
        return $this->tag;
    }

    /** The tag name, e.g. "kontakt". */
    public function getName(): string
    {
        return $this->name;
    }

    /** @return list<string> e.g. ["telefon"] */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    public function getTable(): string
    {
        return $this->table;
    }

    public function getRecord(): array
    {
        return $this->record;
    }

    /** The website root the edited record belongs to (pages, articles, content elements), otherwise null. */
    public function getRootPageId(): int|null
    {
        return $this->rootPageId;
    }

    public function getValue(): string|null
    {
        return $this->value;
    }

    /** Plain text, it gets escaped. */
    public function setValue(string|null $value): void
    {
        $this->value = $value;
    }

    public function getUrl(): string|null
    {
        return $this->url;
    }

    public function getLinkText(): string|null
    {
        return $this->linkText;
    }

    /** Where the value is maintained, e.g. the back end edit URL of the source record. */
    public function setLink(string|null $url, string|null $linkText = null): void
    {
        $this->url = $url;
        $this->linkText = $linkText;
    }
}
