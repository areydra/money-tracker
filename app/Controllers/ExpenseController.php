<?php 
namespace App\Controllers;
use App\Models\ExpenseModel;
use App\Models\AuthModel;

class ExpenseController extends BaseController
{
    // show users list
    public function index(){
        $authModel = new AuthModel();

        if (!$authModel->current_user()) {
            return redirect()->to(base_url('/login'));
        } else {
            $expenseModel = new ExpenseModel();
            $data['expenses'] = $expenseModel->orderBy('id', 'DESC')->findAll();
            return view('dashboard', $data);
        }
    }

    // add user form
    public function create(){
        return view('add_expense');
    }
 
    // insert data
    public function store() {
        $expenseModel = new ExpenseModel();
        $data = [
            'note' => $this->request->getVar('note'),
            'amount'  => $this->request->getVar('amount'),
            'date'  => $this->request->getVar('date'),
        ];
        $expenseModel->insert($data);
        return $this->response->redirect(base_url('/dashboard'));
    }

    // show single user
    public function singleExpense($id = null){
        $expenseModel = new ExpenseModel();
        $data['expense'] = $expenseModel->where('id', $id)->first();
        return view('edit_expense', $data);
    }

    // update user data
    public function update(){
        $expenseModel = new ExpenseModel();
        $id = $this->request->getVar('id');
        $data = [
            'note' => $this->request->getVar('note'),
            'amount'  => $this->request->getVar('amount'),
            'date'  => $this->request->getVar('date'),
        ];
        $expenseModel->update($id, $data);
        return $this->response->redirect(base_url('/dashboard'));
    }
 
    // delete user
    public function delete($id = null){
        $expenseModel = new ExpenseModel();
        $data['expense'] = $expenseModel->where('id', $id)->delete($id);
        return $this->response->redirect(base_url('/dashboard'));
    }    
}