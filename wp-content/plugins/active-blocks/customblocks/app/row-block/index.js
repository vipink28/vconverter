const { registerBlockType }     =   wp.blocks;
const { __ }                    =   wp.i18n;
const {InnerBlocks, useBlockProps}           =   wp.blockEditor;
registerBlockType( 'activedynamics/row', {
    title       :  __( 'Row block', 'activeblocks' ),
    description :  __( 'Creates row div', 'activeblocks' ),
    category    : 'common',
    icon        : 'columns',
    keywords    : [
        __('Row','activeblocks'),
        __('Columns','activeblocks'),
        __('Bootstrap','activeblocks')
    ],
    supports: {
        html    :   false,        
    },
 
    edit: () => {
 
        return (
            <div className="row" { ...useBlockProps }>
                <InnerBlocks />
            </div>
        );
    },
 
    save: () => {
 
        return (
            <div className="row" { ...useBlockProps }>
                <InnerBlocks.Content />
            </div>
        );
    },
} );