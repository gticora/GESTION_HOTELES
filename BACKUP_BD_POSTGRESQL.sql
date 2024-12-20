PGDMP      -            
    |            hoteles    17.0    17.0     Q           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                           false            R           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                           false            S           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                           false            T           1262    16387    hoteles    DATABASE     z   CREATE DATABASE hoteles WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Spanish_Spain.1252';
    DROP DATABASE hoteles;
                     postgres    false            L          0    16460    acomodaciones 
   TABLE DATA           K   COPY public.acomodaciones (id, nombre, created_at, updated_at) FROM stdin;
    public               postgres    false    231   �       D          0    16414    failed_jobs 
   TABLE DATA           a   COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
    public               postgres    false    223   H       N          0    16469    habitaciones 
   TABLE DATA           z   COPY public.habitaciones (id, hotel_id, tipo_habitacion_id, acomodacion_id, cantidad, created_at, updated_at) FROM stdin;
    public               postgres    false    233   e       H          0    16438    hoteles 
   TABLE DATA           r   COPY public.hoteles (id, nombre, ciudad, numero_habitaciones, direccion, nit, created_at, updated_at) FROM stdin;
    public               postgres    false    227   �       ?          0    16389 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public               postgres    false    218   `       B          0    16406    password_reset_tokens 
   TABLE DATA           I   COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
    public               postgres    false    221          F          0    16426    personal_access_tokens 
   TABLE DATA           �   COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
    public               postgres    false    225   ;       J          0    16451    tipos_habitaciones 
   TABLE DATA           P   COPY public.tipos_habitaciones (id, nombre, created_at, updated_at) FROM stdin;
    public               postgres    false    229   �       A          0    16396    users 
   TABLE DATA           u   COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) FROM stdin;
    public               postgres    false    220   !       ^           0    0    acomodaciones_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.acomodaciones_id_seq', 3, true);
          public               postgres    false    230            _           0    0    failed_jobs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);
          public               postgres    false    222            `           0    0    habitaciones_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.habitaciones_id_seq', 7, true);
          public               postgres    false    232            a           0    0    hoteles_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.hoteles_id_seq', 12, true);
          public               postgres    false    226            b           0    0    migrations_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.migrations_id_seq', 8, true);
          public               postgres    false    217            c           0    0    personal_access_tokens_id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 10, true);
          public               postgres    false    224            d           0    0    tipos_habitaciones_id_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.tipos_habitaciones_id_seq', 3, true);
          public               postgres    false    228            e           0    0    users_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.users_id_seq', 1, true);
          public               postgres    false    219            L   J   x�3�N�K���I�4202�54�5�P00�26�24�&�e�钟��J�zcΐ��4�p:�&����'F��� ��*�      D      x������ � �      N   <   x�3�4�4�4�44�4202�54�5�P00�25�24�&�TքU�CN$^G� _�      H   �   x�m��
�0���S�&I�n�WA<x��%tE��n�Sŕ����0��%&=� �X��g�Z�P��o$����q�F��-�}0�i�t�:o�_O�N�Y�/��{�1�D$ǆ���y4�N�F�,r�YV�'���������������u�SJ= egU�      ?   �   x�m���0E��c�:⿘4eԀNJ،�/H`�؇>��s���Q���ߞG��j�'���8���s� O��U��?�w�7��:�f��Yp�:���!Y�ާ�b2���RyC�v�2Es����cKu�v��Kj�r���K�T�R�(�E��s�e_g�}�      B      x������ � �      F   �  x���ͮE���Oq�%R��.W�� �����%$7"���X0�h�޴�H���x������wo+��������~�?^V�|��Oo7����aO��*Y/۰m�����)�"��c�wڰo?����Ϸ��������^�N��v�%����|���6.��{V��`�d
3bOm,!�F��}�m�{�l���רP���FW���Q!���!SϹHd�M�����ɹ۰X��D[M8l����/��_���Nn_b���Wң?�$̡��M���+>DAT��Xt��V����}�� ����0^ ��g��
�s\Iy����i���&�U�hJMݵ�p)'G�{���h�&����Y<�{�L�n�k'ȕ��g��{��x
�^ʓi�r����Ńp�iS��cG��R�nډ�?��Z_���>}�6Gk����I3b���k#���h��Q��a��4W�����J������)p�]I��s�;�^,�k"-��aZ�̀h�4j�f����Q�Z[^c�髋=N,��v��T{�X�ٛ41Ua��nL��}Ӭ��Y"�l���"_�b��'\d,x2^I�g�P ��Mg��9К�Tí^��)�&�]km"�z�e�W�� ������Y�w������q�b�=      J   B   x�3�t-.9�0/%������D��P��B�����������Wi^f>��9�K3KR�V���� � N      A   �   x�3�tO-J�+IU��/I�I-��L�8d����s9c�8U�*U�T�#�"-}�CK�K������+J}�J��B=*��S=���r=#����L���|��A���Ltu,��������q��qqq �9)�     