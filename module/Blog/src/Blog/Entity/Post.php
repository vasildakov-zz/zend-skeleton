<?php

namespace Blog\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entity Class representing a Post of our Zend Framework 2 Blogging Application
 *
 * @ORM\Entity
 * @ORM\Table(name="posts")
 * @property int $id
 * @property string $title
 * @property string $text
 */
class Post {

    /**
     * Primary Identifier
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var integer
     * @access protected
     */
    protected $id;

    /**
     * Title of our Blog Post
     *
     * @ORM\Column(type="string")
     * @var string
     * @access protected
     */
    protected $title;

    /**
     * Textual content of our Blog Post
     *
     * @ORM\Column(type="text")
     * @var string
     * @access protected
     */
    protected $text;

    /**
     * Sets the Identifier
     *
     * @param int $id
     * @access public
     * @return Post
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * Returns the Identifier
     *
     * @access public
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Sets the Title
     *
     * @param string $title
     * @access public
     * @return Post
     */
    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    /**
     * Returns the Title
     *
     * @access public
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Sets the Text Content
     *
     * @param string $text
     * @access public
     * @return Post
     */
    public function setText($text) {
        $this->text = $text;
        return $this;
    }

    /**
     * Returns the Text Content
     *
     * @access public
     * @return string
     */
    public function getText() {
        return $this->text;
    }

}