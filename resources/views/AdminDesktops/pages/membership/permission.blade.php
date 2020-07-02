

          <div class="row">
              <div class="col-md-12">
                <table class="table table-bordered row-border hover text-small">
                        <thead>
                            <tr>
                                <th class="text-center">Tên</th>
                                <th class="text-center">Thêm</th>
                                <th class="text-center">Xóa</th>
                                <th class="text-center">Sửa</th>
                                <th class="text-center">Xem</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">Sự Kiện</td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input  type="checkbox" name="permission[]" @if($data){{$data->contains('event_insert')==true?'checked':''}}@endif id="event_insert" value="event_insert"><label for="event_insert"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('event_update')==true?'checked':''}}@endif id="event_update" value="event_update"><label for="event_update"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('event_delete')==true?'checked':''}}@endif id="event_delete" value="event_delete"><label for="event_delete"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('event_view')==true?'checked':''}}@endif id="event_view" value="event_view"><label for="event_view"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Mua Sắm</td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('shopping_insert')==true?'checked':''}}@endif id="shopping_insert" value="shopping_insert"><label for="shopping_insert"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('shopping_update')==true?'checked':''}}@endif id="shopping_update" value="shopping_update"><label for="shopping_update"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('shopping_delete')==true?'checked':''}}@endif id="shopping_delete" value="shopping_delete"><label for="shopping_delete"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('shopping_view')==true?'checked':''}}@endif id="shopping_view" value="shopping_view"><label for="shopping_view"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Nhóm Sự Kiện</td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('group_my_event_insert')==true?'checked':''}}@endif id="group_my_event_insert" value="group_my_event_insert"><label for="group_my_event_insert"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('group_my_event_update')==true?'checked':''}}@endif id="group_my_event_update" value="group_my_event_update"><label for="group_my_event_update"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('group_my_event_delete')==true?'checked':''}}@endif id="group_my_event_delete" value="group_my_event_delete"><label for="group_my_event_delete"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('group_my_event_view')==true?'checked':''}}@endif id="group_my_event_view" value="group_my_event_view"><label for="group_my_event_view"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Danh Sách Sự Kiện Của Tôi</td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('my_event_insert')==true?'checked':''}}@endif id="my_event_insert" value="my_event_insert"><label for="my_event_insert"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('my_event_update')==true?'checked':''}}@endif id="my_event_update" value="my_event_update"><label for="my_event_update"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('my_event_delete')==true?'checked':''}}@endif id="my_event_delete" value="my_event_delete"><label for="my_event_delete"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('my_event_view')==true?'checked':''}}@endif id="my_event_view" value="my_event_view"><label for="my_event_view"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Chi Tiêu</td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('cost_insert')==true?'checked':''}}@endif id="cost_insert" value="cost_insert"><label for="cost_insert"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('cost_update')==true?'checked':''}}@endif id="cost_update" value="cost_update"><label for="cost_update"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('cost_delete')==true?'checked':''}}@endif id="cost_delete" value="cost_delete"><label for="cost_delete"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('cost_view')==true?'checked':''}}@endif id="cost_view" value="cost_view"><label for="cost_view"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Thu Nhập</td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('salary_insert')==true?'checked':''}}@endif id="salary_insert" value="salary_insert"><label for="salary_insert"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('salary_update')==true?'checked':''}}@endif id="salary_update" value="salary_update"><label for="salary_update"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('salary_delete')==true?'checked':''}}@endif id="salary_delete" value="salary_delete"><label for="salary_delete"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('salary_view')==true?'checked':''}}@endif id="salary_view" value="salary_view"><label for="salary_view"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Khoản Nợ</td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('debt_insert')==true?'checked':''}}@endif id="debt_insert" value="debt_insert"><label for="debt_insert"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('debt_update')==true?'checked':''}}@endif id="debt_update" value="debt_update"><label for="debt_update"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('debt_delete')==true?'checked':''}}@endif id="debt_delete" value="debt_delete"><label for="debt_delete"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('debt_view')==true?'checked':''}}@endif id="debt_view" value="debt_view"><label for="debt_view"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Cho Vay</td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('lendloan_insert')==true?'checked':''}}@endif id="lendloan_insert" value="lendloan_insert"><label for="lendloan_insert"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('lendloan_update')==true?'checked':''}}@endif id="lendloan_update" value="lendloan_update"><label for="lendloan_update"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('lendloan_delete')==true?'checked':''}}@endif id="lendloan_delete" value="lendloan_delete"><label for="lendloan_delete"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('lendloan_view')==true?'checked':''}}@endif id="lendloan_view" value="lendloan_view"><label for="lendloan_view"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Đầu Tư</td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('invest_insert')==true?'checked':''}}@endif id="invest_insert" value="invest_insert"><label for="invest_insert"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('invest_update')==true?'checked':''}}@endif id="invest_update" value="invest_update"><label for="invest_update"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('invest_delete')==true?'checked':''}}@endif id="invest_delete" value="invest_delete"><label for="invest_delete"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('invest_view')==true?'checked':''}}@endif id="invest_view" value="invest_view"><label for="invest_view"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Mục Tiêu</td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('goals_dreams_insert')==true?'checked':''}}@endif id="goals_dreams_insert" value="goals_dreams_insert"><label for="goals_dreams_insert"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('goals_dreams_update')==true?'checked':''}}@endif id="goals_dreams_update" value="goals_dreams_update"><label for="goals_dreams_update"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('goals_dreams_delete')==true?'checked':''}}@endif id="goals_dreams_delete" value="goals_dreams_delete"><label for="goals_dreams_delete"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('goals_dreams_view')==true?'checked':''}}@endif id="goals_dreams_view" value="goals_dreams_view"><label for="goals_dreams_view"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Ví Tiền</td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('wallet_insert')==true?'checked':''}}@endif id="wallet_insert" value="wallet_insert"><label for="wallet_insert"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('wallet_update')==true?'checked':''}}@endif id="wallet_update" value="wallet_update"><label for="wallet_update"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('wallet_delete')==true?'checked':''}}@endif id="wallet_delete" value="wallet_delete"><label for="wallet_delete"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('wallet_view')==true?'checked':''}}@endif id="wallet_view" value="wallet_view"><label for="wallet_view"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Tài Sản</td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('asset_insert')==true?'checked':''}}@endif id="asset_insert" value="asset_insert"><label for="asset_insert"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('asset_update')==true?'checked':''}}@endif id="asset_update" value="asset_update"><label for="asset_update"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('asset_delete')==true?'checked':''}}@endif id="asset_delete" value="asset_delete"><label for="asset_delete"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permission[]" @if($data){{$data->contains('asset_view')==true?'checked':''}}@endif id="asset_view" value="asset_view"><label for="asset_view"></label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                  </table>
                
              </div>
          </div>
          <input type="input" class="d-none" name="id" id="id" value="{{$id}}"/>

