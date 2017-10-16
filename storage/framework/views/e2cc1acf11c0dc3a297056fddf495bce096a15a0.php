<input type="hidden" id="max_file_size_validation" value="<?php echo e(trans('Media::media.max_file_size_validation')); ?>"/>
<div class="modal media-modal fade in" id="inno_media_modal" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
    <div class="modal-dialog modal-lg">
        <div id="drop-area"></div>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="livicon" data-name="image" data-size="18" data-c="#F89A14" data-hc="#5CB85C" data-loop="true"></i> <?php echo e(trans('admin.media_manager')); ?></h4>

            </div>
            <div class="modal-body" style="padding: 0;">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#" id="inno_media_library_tab"><?php echo e(trans('Media::media.media_library')); ?></a></li>
                    <li><a href="#" id="inno_upload_files_tab"><?php echo e(trans('Media::media.upload_files')); ?></a></li>
                </ul>

                <div class="inno-container" id="inno_media_library">
                    <div class="row">
                        <div class="col-md-3 file-info">
                            <div class="media-sidebar">

                                <div class="file-info">
                                    <h2><?php echo e(trans('Media::media.file_information')); ?></h2>
                                    <div class="thumbnail thumbnail-image">
                                        <img src="" draggable="false" alt="">
                                    </div>
                                    <div class="details">
                                        <div class="filename"><b></b></div>
                                        <div class="uploaded"></div>
                                        <div class="file-size"></div>
                                        <div class="dimensions"></div>
                                        
                                        <a id="delete_file" href="javascript:void(0);" data-file-id=""><?php echo e(trans('Media::media.delete')); ?></a>
                                        <div class="compat-meta"></div>
                                    </div>
                                    <div style="clear: both;"></div>
                                    <div>
                                        <div class="form-group">
                                            <label for="url"><?php echo e(trans('Media::media.link')); ?></label>
                                            <input type="text" class="form-control" id="media_item_url" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="title"><?php echo e(trans('Media::media.title')); ?></label>
                                            <input type="text" class="form-control" id="media_item_title" value="">
                                        </div>

                                        <div class="form-group">
                                            <label for="caption"><?php echo e(trans('Media::media.comment')); ?></label>
                                            <textarea class="form-control" id="media_item_caption" rows="3"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="alt"><?php echo e(trans('Media::media.alt_text')); ?></label>
                                            <input type="text" class="form-control" id="media_item_alt">
                                        </div>

                                        <div class="form-group">
                                            <label for="description"><?php echo e(trans('Media::media.description')); ?></label>
                                            <textarea class="form-control" id="media_item_description" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 ">
                            <div class="media-content">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="inno_media_search" placeholder="ابحث...">
                                </div>
                                <div class="inno-media-list">
                                    <ul></ul>
                                    <div id="inno-no-more-files"><?php echo e(trans('Media::media.no_other_files')); ?></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="inno-container" id="inno_upload_files">
                    <div id="inno_upload_files_area">
                        <div class="inno-browse-form">
                            <form action="" method="POST" role="form" enctype="multipart/form-data">
                                <input style="display: none;" type="file" id="files" name="files" multiple>
                            </form>
                            <p><?php echo e(trans('Media::media.drag_the_files')); ?></p>
                            <p><?php echo e(trans('Media::media.or')); ?></p>
                            <a href="javascript:;" id="inno_browse_button" class="btn-sm btn-primary"><?php echo e(trans('Media::media.select_files')); ?></a>
                            <p><?php echo e(trans('Media::media.maximum_file_size')); ?></p>
                            <p><?php echo e(trans('Media::media.or')); ?></p>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-2">
                                    <div class="input-group">
                                        <input  type="text" name="urlFile" id="urlFile" placeholder="Enter image url" class="form-control"  /> <span class="input-group-addon"><button type="button" class="btn-sm btn-danger" id="hide_spin" onclick="fetchImageUrlToGallery()"><?php echo e(trans('Media::media.go')); ?></button></span>
                                        <i class="fa fa-spinner fa-spin" id="go_spin" style="display:none;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="inno-drag-info"><?php echo e(trans('Media::media.drop_file_to_upload')); ?></p>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn-sm btn-success" id="set-choosed-file"><?php echo e(trans('Media::media.select_files')); ?></button>
            </div>
        </div>
    </div>
</div>