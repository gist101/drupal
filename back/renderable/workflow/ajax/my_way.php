<?php

/*
1. Create element.
2. Create '#value_callback', deal normal retrieve and when $form_state['rebuild']. 'form_type_ELEMENT_value'
3. A '#process' function to produce the form element. 'form_process_ELEMENT'.
4. Add a button with '#ajax' to add item lively. Since it always keeps its existence,
  $form_state['rebuild'] is not so required.
5. If the item need to be removed by ajax, the button in it should contains
  executive handler and set the $form_state['rebuild'] to TRUE.
*/