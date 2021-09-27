const { registerBlockType }     =   wp.blocks;
const { __ }                    =   wp.i18n;
const {InnerBlocks, useBlockProps}           =   wp.blockEditor;
registerBlockType( 'activedynamics/container', {
    title       :  __( 'container block', 'activeblocks' ),
    description :  __( 'Creates container div', 'activeblocks' ),
    category    : 'common',
    icon        : 'columns',
    keywords    : [
        __('Container','activeblocks'),
        __('Columns','activeblocks'),
        __('Bootstrap','activeblocks')
    ],
    supports: {
        html    :   false,        
    },
 
    edit: () => {
 
        return (
            <div className="container" { ...useBlockProps }>
                <InnerBlocks />
            </div>
        );
    },
 
    save: () => {
 
        return (
            <div className="container" { ...useBlockProps }>
                <InnerBlocks.Content />
            </div>
        );
    },
} );