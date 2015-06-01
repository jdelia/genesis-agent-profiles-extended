===Genesis Site Title Styles===

Contributors: JDELIA
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=GNJE45UUSUDB6
Tags: genesis agent profiles, extended
Requires at least: 4.0.0
Tested up to: 4.2.2
Stable tag: 1.00
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

This plugin extended the capabilities of the Genesis Agent Profiles plugin by AgentEvolution and is required to use this extended plugin. 

Read more about why we created the plugin here along with examples of how to style them: `http://savvyjackiedesigns.com/genesis-agent-profiles-extended-plugin/`.

== Installation ==

This section describes how to install the plugin and get it working.

1. Make sure you have the Genesis Agent Profiles plugin installed and active.
2. Upload the entire `genesis-agent-profiles-extended-plugin` folder to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. That's it! There is no settings panel for this plugin.

== Frequently Asked Questions ==

= Do this plugin require the Genesis Framework? =

Yes. It also requires the Genesis Agent Profiles plugin to be installed and activated.

= How do I know if the plugin is working? =

After activating the plugin, check the Agent Archive page, it should appear in four columns on your desktop.

= What features have been added? =

New stylesheet replaces the stylesheet in the Genesis Agent Profiles plugin. If you prefer to use your own stylesheet, you can deregister it under Agent Directory under Settings. This deactivates both the original stylesheet and the extended stylesheet. 

Agent Archive Page: 

Displays four columns (Desktop viewport 1024px and up) and is responsive. Two columns on viewports less than 1024px (iPad Portrait, etc.) and one column for smaller viewports (iPhone, etc).

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


== Changelog ==
= 1.01 =
Updated stylesheet.
= 1.0 =
Initial Release.
