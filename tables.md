## Tables

counselors
- parish_id
º last_name
º first_name
º email
º phone

contact_info (polymorphic)
- last_name
- first_name
- middle_initial
- address
- city
- state
- zip
- phone
- email
- contactable_class (counselor/parish/client)
- contactable_id

parishes
- name
º email
º address_1
º address_2
º city
º state
º zip
º phone

clients
º last_name
º first_name
º middle_initial
º address
º city
º state
º zip
º phone
- emergency_phone
- dob
- gender
- ethnicity
- birth_country
- us_citizen
- green_card
- veteran_status
- incarceration
- insurance
- insurance_type

family
- name
- dob
- sex
- birth_country
- insurance
- relationship (child/partner/other)

visits
- client_id
- date
- counselor_id
- request
- action

loans
- client_id
- request_date
- date
- due_date
- amount
- type
- closed
- budgeted

programs (questions on how this is implemented)
- client_id
- name

requests
- client_id
- visit_id
- parish_id
- help_requested
- invoice_supplier
- invoice_amount
- check_amount
- resource
- details
- action_taken
- comments

employment
- client_id
- employed
- type

income
- client_id
- employment
- benefit
- military

living_conditions
- client_id
- conditions

Add to request total amount needed, amount provided


St. Pauls Lazarus Ministry
ALIVE
Old Presbyterian Meeting House
Food Bag
(multiselect)

-once children birthdays are captured, automatically change relationship to Other Adult on birthday

Counselor index - remove parish add phone and email
