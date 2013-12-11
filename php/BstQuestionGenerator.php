<?php
  class BstQuestionGenerator implements QuestionGeneratorInterface{
    protected $rngSeed;

    public function __construct(){
    }

    public function seedRng($seed){
      $this->rngSeed = $seed;
      mt_srand($rngSeed);
    }

    public function removeSeed(){
      $this->rngSeed = NULL;
      mt_srand();
    }

    public function generateQuestion($amt){
      $questions = array();
      for($i = 0; $i < $amt; $i++){
        // $questions[] = $this->generateSearchSequenceQuestion(5);
        if($i < $amt/6) $questions[] = $this->generateSearchSequenceQuestion(5);
        else if($i < $amt*2/6) $questions[] = $this->generateTraversalSequenceQuestion(5);
        else if($i < $amt*3/6) $questions[] = $this->generateSuccessorSequenceQuestion(5);
        else if($i < $amt*4/6) $questions[] = $this->generatePredecessorSequenceQuestion(5);
        else if($i < $amt*5/6) $questions[] = $this->generateMinValueQuestion(5);
        else  $questions[] = $this->generateMaxValueQuestion(5);
      }

      return $questions;
    }

    public function checkAnswer($qObj, $userAns){
      if($qObj->qType == QUESTION_TYPE_SEARCH) return $this->checkSearchSequenceQuestion($qObj, $userAns);
      else if ($qObj->qType == QUESTION_TYPE_TRAVERSAL) return $this->checkTraversalSequenceQuestion($qObj, $userAns);
      else if ($qObj->qType == QUESTION_TYPE_SUCCESSOR) return $this->checkSuccessorSequenceQuestion($qObj, $userAns);
      else if ($qObj->qType == QUESTION_TYPE_PREDECESSOR) return $this->checkPredecessorSequenceQuestion($qObj, $userAns);
      else if ($qObj->qType == QUESTION_TYPE_MIN_VALUE) return $this->checkMinValueQuestion($qObj, $userAns);
      else if ($qObj->qType == QUESTION_TYPE_MAX_VALUE) return $this->checkMaxValueQuestion($qObj, $userAns);
      else return false;
    }

    protected function generateBst(){
      $bst = new Bst();
      $seed = mt_rand();
      $bst->seedRng($seed);
      return $bst;
    }

    protected function generateSearchSequenceQuestion($bstSize){
      $bst = $this->generateBst();
      $bst->generateRandomBst($bstSize);
      $bstContent = $bst->getAllElements();
      $varToBeSearched = $bstContent[mt_rand(0,count($bstContent)-1)];

      $qObj = new QuestionObject();
      $qObj->qTopic = QUESTION_TOPIC_BST;
      $qObj->qType = QUESTION_TYPE_SEARCH;
      $qObj->qParams = array("value" => $varToBeSearched,"subtype" => QUESTION_SUB_TYPE_NONE);
      $qObj->aType = ANSWER_TYPE_VERTEX;
      $qObj->aAmt = ANSWER_AMT_MULTIPLE;
      $qObj->ordered = true;
      $qObj->allowNoAnswer = false;
      $qObj->graphState = $bst->toGraphState();
      $qObj->internalDS = $bst;

      return $qObj;
    }

    protected function checkSearchSequenceQuestion($qObj, $userAns){
      $bst = $qObj->internalDS;
      $varToBeSearched = $qObj->qParams["value"];
      $ans = $bst->search($varToBeSearched);

      $correctness = true;
      if(count($ans) != count($userAns)) $correctness = false;
      else{
        for($i = 0; $i < count($ans); $i++){
          if($ans[$i] != $userAns[$i]){
            $correctness = false;
            break;
          }
        }
      }

      return $correctness;
    }

    protected function generateTraversalSequenceQuestion($bstSize){
      $bst = $this->generateBst();
      $bst->generateRandomBst($bstSize);

      $qObj = new QuestionObject();
      $qObj->qTopic = QUESTION_TOPIC_BST;
      $qObj->qType = QUESTION_TYPE_TRAVERSAL;
      $qObj->qParams = array("subtype" => QUESTION_SUB_TYPE_INORDER_TRAVERSAL);
      $qObj->aType = ANSWER_TYPE_VERTEX;
      $qObj->aAmt = ANSWER_AMT_MULTIPLE;
      $qObj->ordered = true;
      $qObj->allowNoAnswer = false;
      $qObj->graphState = $bst->toGraphState();
      $qObj->internalDS = $bst;

      return $qObj;
    }

    protected function checkTraversalSequenceQuestion($qObj, $userAns){
      $bst = $qObj->internalDS;
      $ans;
      if($qObj->qParams["subtype"] == QUESTION_SUB_TYPE_INORDER_TRAVERSAL) $ans = $bst->inorderTraversal();
      else if($qObj->qParams["subtype"] == QUESTION_SUB_TYPE_PREORDER_TRAVERSAL) $ans = $bst->preorderTraversal();
      else if($qObj->qParams["subtype"] == QUESTION_SUB_TYPE_POSTORDER_TRAVERSAL) $ans = $bst->postorderTraversal();

      $correctness = true;
      if(count($ans) != count($userAns)) $correctness = false;
      else{
        for($i = 0; $i < count($ans); $i++){
          if($ans[$i] != $userAns[$i]){
            $correctness = false;
            break;
          }
        }
      }

      return $correctness;
    }

    protected function generateSuccessorSequenceQuestion($bstSize){
      $bst = $this->generateBst();
      $bst->generateRandomBst($bstSize);
      $bstContent = $bst->getAllElements();
      sort($bstContent);
      array_pop($bstContent);
      $varWhoseSuccessorIsToBeSearched = $bstContent[mt_rand(0,count($bstContent)-1)];

      $qObj = new QuestionObject();
      $qObj->qTopic = QUESTION_TOPIC_BST;
      $qObj->qType = QUESTION_TYPE_SUCCESSOR;
      $qObj->qParams = array("value" => $varWhoseSuccessorIsToBeSearched,"subtype" => QUESTION_SUB_TYPE_NONE);
      $qObj->aType = ANSWER_TYPE_VERTEX;
      $qObj->aAmt = ANSWER_AMT_MULTIPLE;
      $qObj->ordered = true;
      $qObj->allowNoAnswer = false;
      $qObj->graphState = $bst->toGraphState();
      $qObj->internalDS = $bst;

      return $qObj;
    }

    protected function checkSuccessorSequenceQuestion($qObj, $userAns){
      $bst = $qObj->internalDS;
      $varWhoseSuccessorIsToBeSearched = $qObj->qParams["value"];
      $ans = $bst->successor($varWhoseSuccessorIsToBeSearched);

      $correctness = true;
      if(count($ans) != count($userAns)) $correctness = false;
      else{
        for($i = 0; $i < count($ans); $i++){
          if($ans[$i] != $userAns[$i]){
            $correctness = false;
            break;
          }
        }
      }

      return $correctness;
    }

    protected function generatePredecessorSequenceQuestion($bstSize){
      $bst = $this->generateBst();
      $bst->generateRandomBst($bstSize);
      $bstContent = $bst->getAllElements();
      sort($bstContent);
      array_shift($bstContent);
      $varWhosePredecessorIsToBeSearched = $bstContent[mt_rand(0,count($bstContent)-1)];

      $qObj = new QuestionObject();
      $qObj->qTopic = QUESTION_TOPIC_BST;
      $qObj->qType = QUESTION_TYPE_PREDECESSOR;
      $qObj->qParams = array("value" => $varWhosePredecessorIsToBeSearched,"subtype" => QUESTION_SUB_TYPE_NONE);
      $qObj->aType = ANSWER_TYPE_VERTEX;
      $qObj->aAmt = ANSWER_AMT_MULTIPLE;
      $qObj->ordered = true;
      $qObj->allowNoAnswer = false;
      $qObj->graphState = $bst->toGraphState();
      $qObj->internalDS = $bst;

      return $qObj;
    }

    protected function checkPredecessorSequenceQuestion($qObj, $userAns){
      $bst = $qObj->internalDS;
      $varWhosePredecessorIsToBeSearched = $qObj->qParams["value"];
      $ans = $bst->successor($varWhoseSuccessorIsToBeSearched);

      $correctness = true;
      if(count($ans) != count($userAns)) $correctness = false;
      else{
        for($i = 0; $i < count($ans); $i++){
          if($ans[$i] != $userAns[$i]){
            $correctness = false;
            break;
          }
        }
      }

      return $correctness;
    }

    protected function generateMinValueQuestion($bstSize){
      $bst = $this->generateBst();
      $bst->generateLinkedListBst($bstSize, BST_LINKED_LIST_ASCENDING);

      $qObj = new QuestionObject();
      $qObj->qTopic = QUESTION_TOPIC_BST;
      $qObj->qType = QUESTION_TYPE_MIN_VALUE;
      $qObj->qParams = array("subtype" => QUESTION_SUB_TYPE_NONE);
      $qObj->aType = ANSWER_TYPE_VERTEX;
      $qObj->aAmt = ANSWER_AMT_ONE;
      $qObj->ordered = false;
      $qObj->allowNoAnswer = false;
      $qObj->graphState = $bst->toGraphState();
      $qObj->internalDS = $bst;

      return $qObj;
    }

    protected function checkMinValueQuestion($qObj, $userAns){
      $bst = $qObj->internalDS;
      $minVal = $bst->getMinValue();

      $correctness = true;
      if(count($userAns) > 1) $correctness = false;
      else if($userAns[0] != $minVal) $correctness = false;

      return $correctness;
    }

    protected function generateMaxValueQuestion($bstSize){
      $bst = $this->generateBst();
      $bst->generateLinkedListBst($bstSize, BST_LINKED_LIST_DESCENDING);

      $qObj = new QuestionObject();
      $qObj->qTopic = QUESTION_TOPIC_BST;
      $qObj->qType = QUESTION_TYPE_MAX_VALUE;
      $qObj->qParams = array("subtype" => QUESTION_SUB_TYPE_NONE);
      $qObj->aType = ANSWER_TYPE_VERTEX;
      $qObj->aAmt = ANSWER_AMT_ONE;
      $qObj->ordered = false;
      $qObj->allowNoAnswer = false;
      $qObj->graphState = $bst->toGraphState();
      $qObj->internalDS = $bst;

      return $qObj;
    }

    protected function checkMaxValueQuestion($qObj, $userAns){
      $bst = $qObj->internalDS;
      $maxVal = $bst->getMaxValue();

      $correctness = true;
      if(count($userAns) > 1) $correctness = false;
      else if($userAns[0] != $maxVal) $correctness = false;

      return $correctness;
    }
  }
?>