
  <div class="container-down-profile-user container-projects" id="container-project">
    @if($projects != null && count($projects) > 0)
        @foreach($projects as $project)
          <div class="project-box-account" project_id="{{$project->id}}" style="background-image: url({{Voyager::image($project->photos[0])}});" data-aos="zoom-in-right">
            <div class="project-status project-{{strtolower($project->status)}}">{{$project->status}}</div>
            <div class="over-box-background"></div>
            <div class="content-project-box">
              <div class="project-box-title">{{$project->title}}</div>
              <div class="project-box-date-owner-container">
                <div class="project-simple-text">Due date<br> {{$project->end_date}}</div>
                <div class="project-simple-text">Owner/Writer<br> {{$project->director}}/{{$project->writer}}</div>
              </div>
            </div>
            <div class="container-over-project-box">
              <div class="action-element-project-box-over edit-project btn-edit-project">
                
                <input type="hidden" name="project_id" value="{{$project->id}}" />
                <input type="hidden" name="project_title" value="{{$project->title}}" />
                <input type="hidden" name="storyline" value="{{$project->storyline}}" />
                <input type="hidden" name="director" value="{{$project->director}}" />
                <input type="hidden" name="writer" value="{{$project->writer}}" />
                <input type="hidden" name="about" value="{{$project->about}}" />
                <input type="hidden" name="team_description" value="{{$project->team_description}}" />
                <input type="hidden" name="start_date" value="{{$project->start_date}}" />
                <input type="hidden" name="end_date" value="{{$project->start_date}}" />
                <input type="hidden" name="start_fee" value="{{$project->start_fee}}" />
                <input type="hidden" name="end_fee" value="{{$project->end_fee}}" />
                <input type="hidden" name="tags" value="{{json_encode($project->tags)}}" />
                <input type="hidden" name="photos" value="{{json_encode($project->photos)}}" />
                <input type="hidden" name="files" value="{{json_encode($project->files)}}" />
                <input type="hidden" name="jobs" value="{{json_encode($project->jobs)}}" />
                <input type="hidden" name="categories" value="{{json_encode($project->categories)}}" />
                
                <div class="btn-project-box-over edit-project-icon">
                  <img src="../images/edit_lines.png"/>
                </div>
                <div class="text-btn-over-project-box">Edit</div>
              </div>
              <form class="form-delete-project" action='{{ action("ProjectController@deleteProject") }}' method="post">
                {{csrf_field()}}
                <input name="project_id" type="hidden" value="{{$project->id}}"/>
                <button class="action-element-project-box-over btn-delete-project">
                  <div class="btn-project-box-over delete-project">
                    <img src="../images/delete_element.png"/>
                  </div>
                  <div class="text-btn-over-project-box">Delete</div>
                </button>
              </form>
            </div>
          </div>
        @endforeach
      @else
        <div class="important-text-page">
          <img src="../../images/important_circle.png">
          You don't have any projects added. Please try to add.    
        </div>
      @endif

  </div>
  
  <div class="fancybox container-new-project" id="container-project-popup">
      <div class="apply-job-title project-popup-title">New project</div>
      <form class="form-project" action="{{action('ProjectController@addProject')}}" action_edit="{{action('ProjectController@editProject')}}" method="POST">
        {{csrf_field()}}
        <input type="hidden" class="project-step" name="step" value="step_1" />
        <input type="hidden" class="project_id" name="project_id" />
        <input type="hidden" name="check_edit_or_add" value="add" />
        <div class="form-part-1">
          <div class="line-form-project">
            <div class="project-input-box">
              <label class="title-label-project" label_text="{{__('statics.project_name')}}">{{__('statics.project_name')}}</label>
              <input class="input-form-project-popup" name="project_name" placeholder="Title of the project" type="text"/>
            </div>
            <div class="project-input-box">
              <label class="title-label-project" label_text="{{__('statics.project_storyline')}}">{{__('statics.project_storyline')}}</label>
              <textarea rows="5" cols="30" class="textarea-form-project-popup" name="storyline" placeholder="Write a short description"></textarea>
            </div>
          </div>
          <div class="line-form-project">
            <div class="project-input-box">
              <label class="title-label-project" label_text="{{__('statics.project_budget')}}">{{__('statics.project_budget')}}</label>
              <input type="text" min="0" max="1000000" value="3600,800000" name="points" step="100" style="display: none;" class="range-price" />
            </div>
            <div class="project-input-box">
              <label class="title-label-project" label_text="{{__('statics.project_director')}}">{{__('statics.project_director')}}</label>
              <input class="input-form-project-popup" name="director" placeholder="Name" type="text"/>
              </div>
          </div>
          <div class="line-form-project project-item-line-margin">
            <div class="project-input-box">
              <div class="title-label-project input_categories" div_text="{{__('statics.project_category')}}">{{__('statics.project_category')}}</div>
              <input class="categories-selected" name="input_categories" type="hidden"/>
              <div class="container-categories-project">
                @foreach($project_categories as $cat)
                  <div class="category-item-project" cat_id="{{$cat->id}}" cat_name="{{$cat->name}}">{{$cat->name}}</div>
                @endforeach
              </div>
            </div>
            <div class="project-input-box">
              <label class="title-label-project" label_text="{{__('statics.project_writer')}}">{{__('statics.project_writer')}}</label>
              <input class="input-form-project-popup" name="writer" placeholder="Name" type="text"/>
               <div class="title-label-project project-item-margin start_date end_date" div_text="{{__('statics.project_period')}}">{{__('statics.project_period')}}</div>
                <div class="container-two-elements">
                  <input readonly 
                       class="input-form-project-popup datepicker-here" 
                       name="start_date" 
                       placeholder="Start date"
                       data-position='top left'
                       value="2020-05-27"
                       type="text"/>
                  <div class="line-between-inputs">-</div>
                  <input readonly 
                       class="input-form-project-popup datepicker-here" 
                       name="end_date" 
                       placeholder="End date"
                       data-position='top left'
                       value="2020-05-27"
                       type="text"/>
                </div>
                
              </div>
          </div>
          <button step="step_1" class="custom-btn btn-albastru btn-next-proj btn-add-edit-project">{{__('statics.next')}}</button>
        </div>
        <div class="form-part-2">
          <div class="line-form-project">
            <div class="project-input-box project-input-box-full">
              <label class="title-label-project" label_text="{{__('statics.project_about')}}">{{__('statics.project_about')}}</label>
              <textarea rows="5" cols="30" class="textarea-form-project-popup textarea-form-project-popup-big" name="about" placeholder="Detailed description here"></textarea>
            </div>
          </div>
          <div class="line-form-project">
            <div class="project-input-box project-input-box-full">
              <label class="title-label-project" label_text="{{__('statics.project_team')}}">{{__('statics.project_team')}}</label>
              <textarea rows="5" cols="30" class="textarea-form-project-popup" name="team" placeholder="Detailed description here"></textarea>
            </div>
          </div>
          <div class="line-form-project">
            <div class="project-input-box project-input-box-full">
              <div class="title-label-project title-label-project-no-margin uploaded_files" div_text="{{__('statics.project_files')}}">{{__('statics.project_files')}}</div>
              <div class="simple-text-project">If is easier for you, just add flies that are related with your project. For example: screenplay, budgets, resources etc</div>
              <div class="input-file-upload-container">
                <div class="container-file-left">
                  <input class="file-input-project" type="file" name="uploaded_files[]" style="display: none" multiple="true"/>
                  <input class="input-form-project-popup file-name" placeholder="Upload files" type="text"/>
                  <div class="add-file"><img src="../images/folder.png"/></div>
                </div>
              </div>
            </div>
          </div>
          <div class="line-form-project">
            <div class="container-files-added"></div>
          </div>
          <div class="line-form-project">
            <div class="project-input-box project-input-box-full">
              <div class="title-label-project title-label-project-no-margin uploaded_photos" div_text="{{__('statics.project_photos')}}">{{__('statics.project_photos')}}</div>
              <div class="input-file-upload-container">
                <div class="container-file-left">
                  <input class="photos-files" type="file" name="uploaded_photos[]" style="display: none" multiple="true"/>
                  <input class="input-form-project-popup add-photos-trick" placeholder="Project photos" readonly type="text"/>
                  <div class="add-file-photos"><img src="../images/folder.png"/></div>
                </div>
              </div>
            </div>
          </div>
          <div class="line-form-project">
            <div class="project-input-box project-input-box-full container-photos-added"></div>
          </div>
          <div class="buttons-popup-project">
            <div class="custom-btn btn-albastru btn-back-proj2">{{__('statics.back')}}</div>
            <button step="step_2" class="custom-btn btn-albastru btn-next-proj2 btn-add-edit-project">{{__('statics.next')}}</button>
          </div>
        </div>
        <div class="form-part-3">
          <div class="text-popup-project project_jobs" div_text="{{__('statics.project_files')}}">{{__('statics.select_job')}}</div>
          <div class="container-jobs-selection-project">
            <input class="jobs-selected" name="project_jobs" type="hidden"/>
            @if($jobs && count($jobs) > 0)
              @foreach($jobs as $job)
                <label class="container-job-selector" job_id="{{$job->id}}">{{$job->title}}
                  <input type="checkbox">
                  <span class="checkmark-job-selector"></span>
                </label>
              @endforeach
            @else
              <div class="important-text-page">
                <img src="../../images/important_circle.png">
                {{__('statics.no_job_added')}} 
              </div>
            @endif
            
          </div>
          <div class="text-popup-project input_tags" div_text="{{__('statics.select_job_tags')}}">{{__('statics.select_job_tags')}}</div>
          <div class="subtext-popup-project">{{__('statics.email_notify')}}</div>
          <div class="project-input-box project-tags">
            <div class="container-skills-tags tags-container">
              @foreach($tags as $tag)
                <div class="skill-box tag-item " tag_name="{{$tag->name}}" tag_id="{{$tag->id}}">{{$tag->name}}</div>
              @endforeach
              @if($personal_tags)
                @foreach($personal_tags as $pers_tag)
                  <div class="skill-box personal-tag " tag_name="{{$pers_tag->tag}}" tag_id="{{$pers_tag->id}}">{{$pers_tag->tag}}</div>
                @endforeach
              @endif
              <input name="input_tags" style="display: none;" />
              <input name="input_personal_tags" style="display: none;" />
            </div>
            
          </div>
          <div class="buttons-popup-project">
            <div class="custom-btn btn-albastru btn-back-proj3">{{__('statics.back')}}</div>
            <button step="step_3" class="custom-btn btn-albastru btn-add-edit-project">{{__('statics.publish')}}</button>
          </div>
        </div>
      </form>
    </div>
  <div class="trick-open-popup" style="display: none;" data-fancybox="project1" data-src="#container-project-popup" data-hash="false"></div>