<div id="modalmorefilter" class="modal fade" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <!-- <form action="churchList/add" method="POST"> -->
        <div class="modal-header">
          <h5 class="modal-title">MORE FILTER</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container pt-3">
            <div class="row">
              <div class="col-md-12">
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                  <strong><span class="bx bx-info-circle"></span></strong> Select the information you want to filter.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="card mb-2">
                  <div class="card-header multiCollapse filterCollapse" data-bs-toggle="collapse" href="#multiCollapseRecommendation" role="button" aria-expanded="false" aria-controls="multiCollapseRecommendation" id="CollapseRecommendation">
                    RECOMMENDATION FOR <span class="float-end "><i class='bx bxs-chevron-left icon-transition' id="iconCollapseRecommendation"></i></span>
                  </div>
                  <div class="card-body collapse multi-collapse" id="multiCollapseRecommendation">
                    <div class="row mb-2">
                      <div class="col-md-3 mt-2">
                        <label style="cursor: pointer;"><input type="radio" value="All" id="RecommendationAll" class="srchRecommendation" name="srchRecommendation" style="width: 15px; height:15px; cursor: pointer;" checked> ALL</label>
                      </div>
                      <div class="col-md-4 mt-2">
                        <label style="cursor: pointer;"><input type="radio" value="No" id="RecommendationBaptism" class="srchRecommendation" name="srchRecommendation" style="width: 15px; height:15px; cursor: pointer;"> BAPTISM</label>
                      </div>
                      <div class="col-md-5 mt-2">
                        <label style="cursor: pointer;"><input type="radio" value="No" id="RecommendationMembership" class="srchRecommendation" name="srchRecommendation" style="width: 15px; height:15px; cursor: pointer;"> MEMBERSHIP</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card mb-2">
                  <div class="card-header multiCollapse filterCollapse" data-bs-toggle="collapse" href="#multiCollapseDateAdded" role="button" aria-expanded="false" aria-controls="multiCollapseDateAdded" id="CollapseDateAdded">
                    DATE ADDED <span class="float-end "><i class='bx bxs-chevron-left icon-transition' id="iconCollapseDateAdded"></i></span>
                  </div>
                  <div class="card-body collapse multi-collapse" id="multiCollapseDateAdded">
                    <div class="row mb-2">
                      <label class="col-md-5 mt-2">Date From</label>
                      <div class="col-md-7">
                        <input type="date" class="form-control form-control-md" id="srchdateaddeddatefrom" name="srchdateaddeddatefrom">
                      </div>
                    </div>
                    <div class="row mb-2">
                      <label class="col-md-5 mt-2">Date To</label>
                      <div class="col-md-7">
                        <input type="date" class="form-control form-control-md" id="srchdateaddeddateto" name="srchdateaddeddateto">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card mb-2">
                  <div class="card-header multiCollapse filterCollapse" data-bs-toggle="collapse" href="#multiCollapseMembership" role="button" aria-expanded="false" aria-controls="multiCollapseMembership" id="CollapseMembership">
                    MEMBERSHIP DATE <span class="float-end "><i class='bx bxs-chevron-left icon-transition' id="iconCollapseMembership"></i></span>
                  </div>
                  <div class="card-body collapse multi-collapse" id="multiCollapseMembership">
                    <div class="row mb-2">
                      <label class="col-md-5 mt-2">Date From</label>
                      <div class="col-md-7">
                        <input type="date" class="form-control form-control-md" id="srchMembershipdatefrom" name="srchMembershipdatefrom">
                      </div>
                    </div>
                    <div class="row mb-2">
                      <label class="col-md-5 mt-2">Date To</label>
                      <div class="col-md-7">
                        <input type="date" class="form-control form-control-md" id="srchMembershipdateto" name="srchMembershipdateto">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card mb-2">
                  <div class="card-header multiCollapse filterCollapse" data-bs-toggle="collapse" href="#multiCollapseBaptized" role="button" aria-expanded="false" aria-controls="multiCollapseBaptized" id="CollapseBaptized">
                    BAPTIZED IN IMMERSION <span class="float-end "><i class='bx bxs-chevron-left icon-transition' id="iconCollapseBaptized"></i></span>
                  </div>
                  <div class="card-body collapse multi-collapse" id="multiCollapseBaptized">
                    <div class="row mb-2">
                      <div class="col-md-4 mt-2">
                        <label style="cursor: pointer;"><input type="radio" value="All" id="baptizedwhenAll" class="srchbaptizedwhen" name="srchbaptizedwhen" style="width: 15px; height:15px; cursor: pointer;" checked> ALL</label>
                      </div>
                      <div class="col-md-4 mt-2">
                        <label style="cursor: pointer;"><input type="radio" value="Yes" id="baptizedwhenYes" class="srchbaptizedwhen" name="srchbaptizedwhen" style="width: 15px; height:15px; cursor: pointer;"> YES</label>
                      </div>
                      <div class="col-md-4 mt-2">
                        <label style="cursor: pointer;"><input type="radio" value="No" id="baptizedwhenNo" class="srchbaptizedwhen" name="srchbaptizedwhen" style="width: 15px; height:15px; cursor: pointer;"> NO</label>
                      </div>
                    </div>
                    <hr>
                    <div class="row mb-2">
                      <label class="col-md-5 mt-2">Date From</label>
                      <div class="col-md-7">
                        <input type="date" class="form-control form-control-md" id="srchbaptizeddatefrom" name="srchbaptizeddatefrom">
                      </div>
                    </div>
                    <div class="row mb-2">
                      <label class="col-md-5 mt-2">Date To</label>
                      <div class="col-md-7">
                        <input type="date" class="form-control form-control-md" id="srchbaptizeddateto" name="srchbaptizeddateto">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card mb-2">
                  <div class="card-header multiCollapse filterCollapse" data-bs-toggle="collapse" href="#multiCollapseMemStatus" role="button" aria-expanded="false" aria-controls="multiCollapseMemStatus" id="CollapseMemStatus">
                    MEMBER STATUS <span class="float-end "><i class='bx bxs-chevron-left icon-transition' id="iconCollapseMemStatus"></i></span>
                  </div>
                  <div class="card-body collapse multi-collapse" id="multiCollapseMemStatus">
                    <div class="row mb-2">
                      <div class="col-md-4 mt-2">
                        <label style="cursor: pointer;"><input type="radio" value="All" id="MemStatusAll" class="srchMemStatus" name="srchMemStatus" style="width: 15px; height:15px; cursor: pointer;" checked> ALL</label>
                      </div>
                      <div class="col-md-4 mt-2">
                        <label style="cursor: pointer;"><input type="radio" value="Active" id="MemStatusActive" class="srchMemStatus" name="srchMemStatus" style="width: 15px; height:15px; cursor: pointer;"> ACTIVE</label>
                      </div>
                      <div class="col-md-4 mt-2">
                        <label style="cursor: pointer;"><input type="radio" value="InActive" id="MemStatusInActive" class="srchMemStatus" name="srchMemStatus" style="width: 15px; height:15px; cursor: pointer;"> INACTIVE</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card mb-2">
                  <div class="card-header multiCollapse filterCollapse" data-bs-toggle="collapse" href="#multiCollapseBirthday" role="button" aria-expanded="false" aria-controls="multiCollapseBirthday" id="CollapseBirthday">
                    Birthday DATE <span class="float-end "><i class='bx bxs-chevron-left icon-transition' id="iconCollapseBirthday"></i></span>
                  </div>
                  <div class="card-body collapse multi-collapse" id="multiCollapseBirthday">
                    <div class="row mb-2">
                      <label class="col-md-5 mt-2">Date From</label>
                      <div class="col-md-7">
                        <input type="date" class="form-control form-control-md" id="srchbdaydatefrom" name="srchbdaydatefrom">
                      </div>
                    </div>
                    <div class="row mb-2">
                      <label class="col-md-5 mt-2">Date To</label>
                      <div class="col-md-7">
                        <input type="date" class="form-control form-control-md" id="srchbdaydateto" name="srchbdaydateto">
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>

          </div>          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" onclick="searchFilter();"><i class='bx bx-check'></i> Done</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class='bx bx-x'></i> Close</button>
        </div>
      </div>
    <!-- </form> -->
  </div>
</div>