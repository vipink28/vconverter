// console.log( wp );
const { registerBlockType }     =   wp.blocks;
const { __ }                    =   wp.i18n;
const { InspectorControls, MediaUpload, MediaUploadCheck,useBlockProps, RichText }     =   wp.blockEditor;
const { PanelBody, PanelRow, Button, Dashicon }   =   wp.components;

registerBlockType('activedynamics/marketview', {
    title       :  __( 'mv block', 'activeblocks' ),
    description :  __( 'Creates the columns for market value section', 'activeblocks' ),
    category    : 'common',
    icon        : 'embed-photo',
    keywords    : [
        __('homepage','activeblocks'),
        __('market value','activeblocks'),
        __('image','activeblocks')
    ],
    supports: {
        html    :   true,        
    },    
    attributes  :   {
        title   :   {
            type      :     'array',
            source    :     'children',
            selector  :     '.mv-grid-title',            
        },
        description     :   {
            type      :     'string',
            source    :     'html',
            selector  :     '.mv-grid-content',
        },
        img_ID   :   {
            type      :     'number',
        },
        img_URL     :   {
            type      :     'string',
            source    :   'attribute',
            attribute   :   'src',
            selector  :     'img'
        },
        img_alt     :   {
            type      :     'string',
            source    :   'attribute',
            attribute   :   'alt',
            selector  :     'img'
        }

    },
    edit        : ( props ) => {
        const updateTitle = ( new_val ) => {
            props.setAttributes({title:new_val})
        }
        const updateDescription = ( new_val ) => {
            props.setAttributes({description:new_val})
        }
        const select_img    = (img) => {
            props.setAttributes({
                img_ID:     img.id,
                img_URL:    img.url,
                img_alt:    img.alt
            })
        };
        const remove_img    = ()=>{
            props.setAttributes({
            img_ID:     null,
            img_URL:    null,
            img_alt:    null
        })
        };
        const blockProps = useBlockProps();

        return (          
            <div className={ props.className }>
                <div className="mv-grid-box">
                  <div className="overlay-text">                    
                    <div className="mv-grid-title">
                    <RichText
                tagname='h5'
                placeholder={ __( 'Add Title.','activeblocks' )}
                onChange = {updateTitle}
                value = {props.attributes.title}
                 />      
                    </div>
                    <div className="mv-grid-content">
                    <RichText
                    { ...blockProps }
                tagname='div'
                placeholder={ __( 'Add Description.','activeblocks' )}
                onChange = {updateDescription}
                value = {props.attributes.description}
                 />
                  </div>
                  </div>
                  {props.attributes.img_ID ? (
                      <div className="image-ctr">
                          <img src={ props.attributes.img_URL }
                          alt={props.attributes.img_alt}/>
                          {props.isSelected ? (
                              <Button className="btn-remove" onClick={remove_img}> <Dashicon icon="no" size="20"/>  </Button>
                          ) : null}
                      </div>
                  ) : (
                      <MediaUploadCheck>
                          <MediaUpload 
                          allowedType={[ 'image' ]}
                          value={props.attributes.img_ID}
                          onSelect={ select_img }
                          render={({open}) => (
                            <Button className={ "btn btn-lg btn-success" } onClick={ open }>
                                {__( 'Upload Image','activeblocks' )}
                            </Button>
                          )}>

                          </MediaUpload>
                      </MediaUploadCheck>
                  )}
                </div>
            </div>
);
    },
    save        :   ( props ) => {
        const blockProps = useBlockProps.save();
        return (
           
            <div className="mv-grid-box">
              <div className="overlay-text">                    
                <div className="mv-grid-title">
                  {props.attributes.title}
                </div>
                <RichText.Content 
                { ...blockProps }
                tagName="div"
                className="mv-grid-content"
                value={ props.attributes.description }
            />
                
              </div>
              <img src={ props.attributes.img_URL }
                          alt={props.attributes.img_alt}/>
            </div>        
            )
    } 

});