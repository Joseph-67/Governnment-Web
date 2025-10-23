<?php

 return [
            'title'               => $data['title'] ?? null,
            'slug'                => $data['slug'] ?? null,
            'menu_order'          => $data['menu_order']?? null,
            'excerpt'             => $data['excerpt'] ?? null,
            'body'                => $data['body'] ?? null,

            // Scheduling
            'publish_at'          => $data['publish_at'] ?? null,
            'expire_at'           => $data['expire_at'] ?? null,

            // visibility & status
            'visibility'          => $data['visibility'],
            'visibility_password' => $data['visibility_password'] ?? null,
            'status'              => $data['status'] ?? 'draft',

            // relationships
            'parent_id'           => $data['parent_id'] ?? null,
            'author_id'           => $data['author_id'] ?? Auth::id(),
            
            // tags & categories
            'tags'                => $data['tags'] ?? [],
            'categories'          => $data['categories'] ?? [],

            // SEO
            'meta_title'          => $data['meta_title'] ?? null,
            'meta_description'    => $data['meta_description'] ?? null,
            'keywords'            => $data['keywords'] ?? null,
            'canonical_url'       => $data['canonical_url'] ?? null,
            'robots_index'        => $data['robots_index'] ?? 'index',
            'robots_follow'       => $data['robots_follow'] ?? 'follow',
            'custom_meta'         => $data['custom_meta'] ?? null,

            // open graph
            'og_title'            => $data['og_title']?? null,
            'og_description'      => $data['og_description']?? null,
            'og_image'            => $data['og_image'] ?? null,
            
            // twitter
            'twitter_title'       => $data['twitter_title'] ?? null,
            'twitter_description' => $data['twitter_description'] ?? null,
            'twitter_image'       => $data['twitter_image'] ?? null,

            // Media
            'featured_image'      => $data['featured_image'] ?? null,
            'gallery_images'      => $data['gallery_images'] ?? [],
            'hero_bg'             => $data['hero_bg'] ?? null,

            // Hero
            'hero_title'          => $data['hero_title'] ?? null,
            'hero_subtitle'       => $data['hero_subtitle'] ?? null,
            'hero_button_text'    => $data['hero_button_text'] ?? null,
            'hero_button_url'     => $data['hero_button_url'] ?? null,

            // Layout & Template
            'template'            => $data['template'] ?? 'default',
            'layout_style'        => $data['layout_style'] ?? 'full-width',
            'sidebar_widgets'     => $data['sidebar_widgets'] ?? [],
            'footer_widgets'      => $data['footer_widgets'] ?? [],

            // Components
            'enable_slider'       => $data['enable_slider'] ?? false,
            'slider_images'       => $data['slider_images'] ?? [],
            'reusable_components' => $data['reusable_components'] ?? [],
            'contact_form_enabled'=> $data['contact_form_enabled'] ?? false,
            'contact_form_email'  => $data['contact_form_email'] ?? null,
            'contact_form_subject'=> $data['contact_form_subject'] ?? null,
            'contact_form_field'  => $data['contact_form_field'] ?? [],
            'newsletter_enabled'  => $data['newsletter_enabled'] ?? false,
            'newsletter_provider' => $data['newsletter_provider'] ?? null,

            // Access
            'visible_roles'       => $data['visible_roles'] ?? [],
            'device_visibility'   => $data['device_visibility'] ?? [],
            'geo_rules'           => $data['geo_rules'] ?? [],

            // Customization
            'custom_css'          => $data['custom_css'] ?? null,
            'custom_js'           => $data['custom_js'] ?? null,
            'custom_head'         => $data['custom_head'] ?? null,
            'custom_body'         => $data['custom_body'] ?? null,

            // Analytics
            'tracking_code'       => $data['tracking_code'] ?? null,
            'ab_variants'         => $data['ab_variants'] ?? [],
            'conversion_goals'    => $data['conversion_goals'] ?? [],

            // Meta
            'revision_notes'      => $data['revision_notes'] ?? null,
        ];