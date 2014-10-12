<?php
    /**
     * theme related functions
     */
     
    /**
     * Get title for the webpage by concatenating page specific title with site-wide title.
     *
     * @param string $title for this page.
     * @return string/null wether the favicon is defined or not.
     */
    function getTitle($title) {
      global $anax;
      return $title . (isset($anax['title_append']) ? $anax['title_append'] : null);
    }
    
?>