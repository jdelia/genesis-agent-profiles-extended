===Genesis Agent Profiles Extended===

Contributors: JDELIA
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=3SHMWYFBDVPYU
Tags: genesis, genesis framework, agent profiles, agent directory, real estate agents, real estate, staff, team, team members, genesis agent profiles, extended, agent evolution, wp listings, agentpress listings 
Requires at least: 4.0.0
Tested up to: 4.4.2
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


== Description ==

**DEVELOPMENT DISCONTINUED**

There will be no further updates to this plugin. The Genesis Agent Profiles plugin is no longer supported by Agent Evolution and since this plugin depends on that, further development of this plugin is no longer an option. 

Support for this plugin has ended.

Use this plugin instead: https://wordpress.org/plugins/impress-agents/


This plugin extends the capabilities of the Genesis Agent Profiles plugin by AgentEvolution and is required to use this extended plugin. 

Why I wrote this plugin: http://savvyjackiedesigns.com/genesis-agent-profiles-extended-plugin/

**NEW STYLESHEET**

A new stylesheet replaces the stylesheet in the Genesis Agent Profiles plugin. If you prefer to use your own stylesheet, you can deregister it under Agent Directory under Settings. This deactivates both the original stylesheet and the extended stylesheet.

**AGENT ARCHIVE PAGE**

Displays four columns (Desktop viewport 1024px and up) and is responsive. Two columns on viewports less than 1024px (iPad Portrait, etc.) and one column for smaller viewports (iPhone, etc).


**FEATURED AGENT WIDGET**

Feature one agent, a random agent, a random group of agents or all agents.

When displaying Show Random, you may choose how many agents to select and display at random with each page load. (1-99)

When displaying all agents, you may choose how they are sorted: random, title, date added, menu order, or ID. They can be ordered in Ascending or descending order.

Choosing random will shuffle with each page load.

**IMPROVED SHORTCODE FUNCTIONALITY**

The shortcode [agent_profiles] can now be sorted. Here are some examples of what you can do.

To show selected agents:

Example: post_id 752 and 760 and sorted by title (agent’s name):

[agent_profiles orderby=title order=ASC id=’752,760′]

To show all agents in a random order:

[agent_profiles orderby=rand]

To show all agents sorted by title (agent’s name) in ascending order (A-Z):

[agent_profiles orderby=title order=ASC]

To show all agents sorted by menu_order (Order # in Page Attributes for that agent) in descending order (3,2,1):

[agent_profiles orderby=menu_order order=DESC]

Additional sorts: orderby=date, orderby=ID (post ID #)


**NEW AGENT PHOTO SIZE**

This plugin adds a new image size of 200px by 200px for the agent’s featured image. It is not selected by default when you activate the plugin. If you already have images uploaded, you will need to regenerate your thumbnail images first.


**CHANGES IN HOW THE PLUGIN BEHAVES**

If you are using the AgentPress listings plugin or the WP Listings plugin to connect agent listings to their profile:

The View My Listings link will only be shown if that agent has listings. In the original plugin, the link was shown regardless. Now the listings are checked before displaying the link. No sense sending visitors to link without any listings.



== Installation ==

This section describes how to install the plugin and get it working.

1. Make sure you have the Genesis Agent Profiles plugin installed and active.
2. Upload the entire `genesis-agent-profiles-extended-plugin` folder to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. That's it! There is no settings panel for this plugin.
5. This plugin adds a new image size of 200 x 200 for the agent’s featured image. 

== Frequently Asked Questions ==

= Do this plugin require the Genesis Framework? =

Yes. It also requires the Genesis Agent Profiles plugin to be installed and activated.

= How do I know if the plugin is working? =

After activating the plugin, check the Agent Archive page, it should appear in four columns on your desktop.

= This plugin adds a new image size of 200 x 200 for the agent’s featured image. If you already have images uploaded and want to use the new image size, you will need to regenerate your thumbnail images. You can do that by downloading the free plugin ‘Regenerate Thumbnails’ by Alex Mills (Viper007Bond) in the WordPress.org plugin repo. 

https://wordpress.org/plugins/regenerate-thumbnails/

Install the plugin and activate it. Go to Tools - Regen. Thumbnails. Regenerate all image, or if you prefer you can selectively regenerate the agent thumbnails in the media library by selecting the agents, then in bulk actions, choose Regenerate thumbnails.

= What features have been added? =

New stylesheet replaces the stylesheet in the Genesis Agent Profiles plugin. If you prefer to use your own stylesheet, you can deregister it under Agent Directory under Settings. This deactivates both the original stylesheet and the extended stylesheet. 

Agent Archive Page: 

Removed pagination - it now shows up to 999 agents per page.

Displays four columns (Desktop viewport 1024px and up) and is responsive. Two columns on viewports less than 1024px (iPad Portrait, etc.) and one column for smaller viewports (iPhone, etc). If you would like to sort them differently than the default Order attribute, you’ll find a handy piece of code on my website for that. You can sort randomly, by title (agent name), or date added - just to name a few.

Featured Agent Widget:

You may now featured one agent as before, plus feature a random agent or group of random agents or all agents. 

When displaying Show Random, you may choose how many agents to select and display at random with each page load. (1-99)

When displaying all agents, you may choose how they are sorted: random, title, date added, menu order, or ID. They can be ordered in Ascending or descending order. Choosing random will shuffle with each page load. Note: Ascending or descending has no effect when you choose random.


Genesis Agent Profiles shortcodes:
 
This shortcode can now be sorted.

To show all agents in a random order:

[agent_profiles orderby=rand]

To show all agents sorted by title (agent name) in ascending order (A-Z):

[agent_profiles orderby=title order=ASC]

To show all agents sorted by menu_order (Order # in Page Attributes for that agent)  in 
descending order (3,2,1):

[agent_profiles orderby=menu_order order=DESC]

Additional sorts: orderby=date, orderby=ID (post ID #)


==Changelog==
= 1.0.0 =
Updated to correct a conflict with the AgentPress Listings and WP Listings plugin.
= 0.9.5 =
Updated description on WordPress.org plugin page. 
= 0.9.4 =
Updated widget code to use PHP 5 __constructor() as PHP 4 $this->WP_Widget() is deprecated in upcoming release of WordPress 4.3. Version bump to 0.9.4 in plugin.php.
= 0.9.3 =
Updated stylesheet to center agent image on mobile phone view when on single agent profile.

= 0.9.2 =
Initial Release.

==Upgrade Notice==
= 1.0.0 =
Updated to correct a conflict with the AgentPress Listings and WP Listings plugin.
= 0.9.5=
Updated code to support upcoming release of WordPress 4.3. Version bump to 0.9.4 in plugin.php.
= 0.9.3 =
Corrects format issue when viewing in portrait mode on viewport of 480px or less for single agent.
