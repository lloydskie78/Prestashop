{extends file='page.tpl'} {*page.tpl is default tpl file of prestashop*}
{block name="page_content_container"}
    <ul>
        <li>
            {l s='Number of products : ' mod='multipurpose'}&nbsp;{$nb_product}
        </li>
        <li>
            Categories:
            <ul>
                {foreach from=$categories item=cat}
                    <li>{$cat['name']}</li>
                {/foreach}
            </ul>
        </li>
        <li>
            {$shop_name}
        </li>
        <li>{$manufacturer['name']}</li>
    </ul>
{/block}