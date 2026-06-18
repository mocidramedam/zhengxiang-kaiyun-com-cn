<?php

/**
 * Represents a rich link card generator that produces safe, escaped HTML content.
 */
class LinkCard
{
    /**
     * @var string The target URL for the link card.
     */
    private string $url;

    /**
     * @var string The display title or heading for the card.
     */
    private string $title;

    /**
     * @var string A short descriptive text shown in the card.
     */
    private string $description;

    /**
     * @var string Optional image URL for the card thumbnail.
     */
    private string $imageUrl;

    /**
     * @var string Optional CSS class for styling.
     */
    private string $cssClass;

    /**
     * Constructor.
     *
     * @param string $url
     * @param string $title
     * @param string $description
     * @param string $imageUrl
     * @param string $cssClass
     */
    public function __construct(
        string $url = '',
        string $title = '',
        string $description = '',
        string $imageUrl = '',
        string $cssClass = 'link-card'
    ) {
        $this->url = $url;
        $this->title = $title;
        $this->description = $description;
        $this->imageUrl = $imageUrl;
        $this->cssClass = $cssClass;
    }

    /**
     * Set the URL.
     *
     * @param string $url
     * @return self
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Set the title.
     *
     * @param string $title
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Set the description.
     *
     * @param string $description
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Set the image URL.
     *
     * @param string $imageUrl
     * @return self
     */
    public function setImageUrl(string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;
        return $this;
    }

    /**
     * Set the CSS class.
     *
     * @param string $cssClass
     * @return self
     */
    public function setCssClass(string $cssClass): self
    {
        $this->cssClass = $cssClass;
        return $this;
    }

    /**
     * Render the link card as an escaped HTML string.
     *
     * @return string
     */
    public function render(): string
    {
        $escapedUrl = htmlspecialchars($this->url, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $escapedTitle = htmlspecialchars($this->title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $escapedDesc = htmlspecialchars($this->description, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $escapedImage = htmlspecialchars($this->imageUrl, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $escapedClass = htmlspecialchars($this->cssClass, ENT_QUOTES | ENT_HTML5, 'UTF-8');

        $html = '<div class="' . $escapedClass . '">' . "\n";
        $html .= '    <a href="' . $escapedUrl . '" target="_blank" rel="noopener noreferrer">' . "\n";

        if ($escapedImage !== '') {
            $html .= '        <img src="' . $escapedImage . '" alt="' . $escapedTitle . '" />' . "\n";
        }

        $html .= '        <div class="link-card-content">' . "\n";
        $html .= '            <h3>' . $escapedTitle . '</h3>' . "\n";
        $html .= '            <p>' . $escapedDesc . '</p>' . "\n";
        $html .= '        </div>' . "\n";
        $html .= '    </a>' . "\n";
        $html .= '</div>' . "\n";

        return $html;
    }

    /**
     * Static factory method with default example data.
     *
     * @return self
     */
    public static function createDefault(): self
    {
        return new self(
            'https://www.zhengxiang-kaiyun.com.cn',
            '开云体育',
            '开云体育 - 专业体育资讯与互动平台，提供最新赛事动态与深度分析。',
            '',
            'link-card link-card-default'
        );
    }

    /**
     * Render a default example link card.
     *
     * @return string
     */
    public static function renderDefault(): string
    {
        $card = self::createDefault();
        return $card->render();
    }
}