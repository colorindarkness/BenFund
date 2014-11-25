<?php
session_start();
require ("D:/benfund.com/includes/globals.php"); 
require_once($ROOT."/functions/common.php");
$sortid = '#kmfdm';
$sortit = '#kmfdm';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-us">
<head>
	<title>jQuery plugin: Tablesorter 2.0 - Pager plugin</title>
	<script type="text/javascript" src="https://www.benfund.com/includes/js/jquery.js"></script>
	<?php	include($ROOT."/includes/js/tablesort.php");?>
</head>
<body>

<table class="tablesorter" id="kmfdm" align="center" border="0" cellpadding="4" cellspacing="0" width="95%">

	<thead>
		<tr>
			<th>Name</th>
			<th>Major</th>
			<th>Sex</th>
			<th>English</th>
			<th>Japanese</th>

			<th>Calculus</th>
			<th>Geometry</th>

		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Student01</td>
			<td>Languages</td>
			<td>male</td>

			<td>80</td>
			<td>70</td>
			<td>75</td>
			<td>80</td>
		</tr>
		<tr>

			<td>Student02</td>

			<td>Mathematics</td>
			<td>male</td>
			<td>90</td>
			<td>88</td>
			<td>100</td>

			<td>90</td>

		</tr>
		<tr>
			<td>Student03</td>
			<td>Languages</td>
			<td>female</td>

			<td>85</td>
			<td>95</td>

			<td>80</td>
			<td>85</td>
		</tr>
		<tr>

			<td>Student04</td>
			<td>Languages</td>
			<td>male</td>

			<td>60</td>
			<td>55</td>
			<td>100</td>

			<td>100</td>
		</tr>
		<tr>
			<td>Student05</td>

			<td>Languages</td>
			<td>female</td>

			<td>68</td>
			<td>80</td>
			<td>95</td>
			<td>80</td>

		</tr>
		<tr>

			<td>Student06</td>
			<td>Mathematics</td>
			<td>male</td>
			<td>100</td>
			<td>99</td>

			<td>100</td>

			<td>90</td>
		</tr>
		<tr>
			<td>Student07</td>
			<td>Mathematics</td>
			<td>male</td>

			<td>85</td>
			<td>68</td>
			<td>90</td>
			<td>90</td>
		</tr>
		<tr>
			<td>Student08</td>

			<td>Languages</td>
			<td>male</td>
			<td>100</td>
			<td>90</td>
			<td>90</td>
			<td>85</td>

		</tr>
		<tr>
			<td>Student09</td>
			<td>Mathematics</td>
			<td>male</td>
			<td>80</td>

			<td>50</td>

			<td>65</td>
			<td>75</td>
		</tr>
		<tr>
			<td>Student10</td>

			<td>Languages</td>
			<td>male</td>

			<td>85</td>
			<td>100</td>
			<td>100</td>
			<td>90</td>

		</tr>
		<tr>
			<td>Student11</td>

			<td>Languages</td>
			<td>male</td>
			<td>86</td>

			<td>85</td>
			<td>100</td>
			<td>100</td>

		</tr>
		<tr>
			<td>Student12</td>

			<td>Mathematics</td>
			<td>female</td>
			<td>100</td>
			<td>75</td>

			<td>70</td>
			<td>85</td>

		</tr>
		<tr>
			<td>Student13</td>
			<td>Languages</td>
			<td>female</td>

			<td>100</td>

			<td>80</td>
			<td>100</td>
			<td>90</td>
		</tr>
		<tr>
			<td>Student14</td>

			<td>Languages</td>
			<td>female</td>
			<td>50</td>
			<td>45</td>
			<td>55</td>
			<td>90</td>

		</tr>
		<tr>
			<td>Student15</td>
			<td>Languages</td>
			<td>male</td>
			<td>95</td>

			<td>35</td>

			<td>100</td>
			<td>90</td>
		</tr>
		<tr>
			<td>Student16</td>

			<td>Languages</td>
			<td>female</td>

			<td>100</td>
			<td>50</td>
			<td>30</td>
			<td>70</td>

		</tr>
		<tr>
			<td>Student17</td>

			<td>Languages</td>
			<td>female</td>
			<td>80</td>

			<td>100</td>
			<td>55</td>
			<td>65</td>

		</tr>
		<tr>
			<td>Student18</td>

			<td>Mathematics</td>
			<td>male</td>
			<td>30</td>
			<td>49</td>

			<td>55</td>
			<td>75</td>

		</tr>
		<tr>
			<td>Student19</td>
			<td>Languages</td>
			<td>male</td>

			<td>68</td>

			<td>90</td>
			<td>88</td>
			<td>70</td>
		</tr>
		<tr>
			<td>Student20</td>

			<td>Mathematics</td>
			<td>male</td>
			<td>40</td>
			<td>45</td>
			<td>40</td>
			<td>80</td>

		</tr>
		<tr>
			<td>Student21</td>
			<td>Languages</td>
			<td>male</td>
			<td>50</td>

			<td>45</td>

			<td>100</td>
			<td>100</td>
		</tr>
		<tr>
			<td>Student22</td>

			<td>Mathematics</td>
			<td>male</td>

			<td>100</td>
			<td>99</td>
			<td>100</td>
			<td>90</td>

		</tr>
		<tr>
			<td>Student23</td>

			<td>Languages</td>
			<td>female</td>
			<td>85</td>

			<td>80</td>
			<td>80</td>
			<td>80</td>

		</tr>
	<tr><td>student23</td><td>Mathematics</td><td>male</td><td>82</td><td>77</td><td>0</td><td>79</td></tr><tr><td>student24</td><td>Languages</td><td>female</td><td>100</td><td>91</td><td>13</td><td>82</td></tr><tr><td>student25</td><td>Mathematics</td><td>male</td><td>22</td><td>96</td><td>82</td><td>53</td></tr><tr><td>student26</td><td>Languages</td><td>female</td><td>37</td><td>29</td><td>56</td><td>59</td></tr><tr><td>student27</td><td>Mathematics</td><td>male</td><td>86</td><td>82</td><td>69</td><td>23</td></tr><tr><td>student28</td><td>Languages</td><td>female</td><td>44</td><td>25</td><td>43</td><td>1</td></tr><tr><td>student29</td><td>Mathematics</td><td>male</td><td>77</td><td>47</td><td>22</td><td>38</td></tr><tr><td>student30</td><td>Languages</td><td>female</td><td>19</td><td>35</td><td>23</td><td>10</td></tr><tr><td>student31</td><td>Mathematics</td><td>male</td><td>90</td><td>27</td><td>17</td><td>50</td></tr><tr><td>student32</td><td>Languages</td><td>female</td><td>60</td><td>75</td><td>33</td><td>38</td></tr><tr><td>student33</td><td>Mathematics</td><td>male</td><td>4</td><td>31</td><td>37</td><td>15</td></tr><tr><td>student34</td><td>Languages</td><td>female</td><td>77</td><td>97</td><td>81</td><td>44</td></tr><tr><td>student35</td><td>Mathematics</td><td>male</td><td>5</td><td>81</td><td>51</td><td>95</td></tr><tr><td>student36</td><td>Languages</td><td>female</td><td>70</td><td>61</td><td>70</td><td>94</td></tr><tr><td>student37</td><td>Mathematics</td><td>male</td><td>60</td><td>3</td><td>61</td><td>84</td></tr><tr><td>student38</td><td>Languages</td><td>female</td><td>63</td><td>39</td><td>0</td><td>11</td></tr><tr><td>student39</td><td>Mathematics</td><td>male</td><td>50</td><td>46</td><td>32</td><td>38</td></tr><tr><td>student40</td><td>Languages</td><td>female</td><td>51</td><td>75</td><td>25</td><td>3</td></tr><tr><td>student41</td><td>Mathematics</td><td>male</td><td>43</td><td>34</td><td>28</td><td>78</td></tr><tr><td>student42</td><td>Languages</td><td>female</td><td>11</td><td>89</td><td>60</td><td>95</td></tr><tr><td>student43</td><td>Mathematics</td><td>male</td><td>48</td><td>92</td><td>18</td><td>88</td></tr><tr><td>student44</td><td>Languages</td><td>female</td><td>82</td><td>2</td><td>59</td><td>73</td></tr><tr><td>student45</td><td>Mathematics</td><td>male</td><td>91</td><td>73</td><td>37</td><td>39</td></tr><tr><td>student46</td><td>Languages</td><td>female</td><td>4</td><td>8</td><td>12</td><td>10</td></tr><tr><td>student47</td><td>Mathematics</td><td>male</td><td>89</td><td>10</td><td>6</td><td>11</td></tr><tr><td>student48</td><td>Languages</td><td>female</td><td>90</td><td>32</td><td>21</td><td>18</td></tr><tr><td>student49</td><td>Mathematics</td><td>male</td><td>42</td><td>49</td><td>49</td><td>72</td></tr><tr><td>student50</td><td>Languages</td><td>female</td><td>56</td><td>37</td><td>67</td><td>54</td></tr><tr><td>student51</td><td>Mathematics</td><td>male</td><td>48</td><td>31</td><td>55</td><td>63</td></tr><tr><td>student52</td><td>Languages</td><td>female</td><td>38</td><td>91</td><td>71</td><td>74</td></tr><tr><td>student53</td><td>Mathematics</td><td>male</td><td>2</td><td>63</td><td>85</td><td>100</td></tr><tr><td>student54</td><td>Languages</td><td>female</td><td>75</td><td>81</td><td>16</td><td>23</td></tr><tr><td>student55</td><td>Mathematics</td><td>male</td><td>65</td><td>52</td><td>15</td><td>53</td></tr><tr><td>student56</td><td>Languages</td><td>female</td><td>23</td><td>52</td><td>79</td><td>94</td></tr><tr><td>student57</td><td>Mathematics</td><td>male</td><td>80</td><td>22</td><td>61</td><td>12</td></tr><tr><td>student58</td><td>Languages</td><td>female</td><td>53</td><td>5</td><td>79</td><td>79</td></tr><tr><td>student59</td><td>Mathematics</td><td>male</td><td>96</td><td>32</td><td>35</td><td>17</td></tr><tr><td>student60</td><td>Languages</td><td>female</td><td>16</td><td>76</td><td>65</td><td>27</td></tr><tr><td>student61</td><td>Mathematics</td><td>male</td><td>20</td><td>57</td><td>22</td><td>23</td></tr><tr><td>student62</td><td>Languages</td><td>female</td><td>19</td><td>83</td><td>87</td><td>78</td></tr><tr><td>student63</td><td>Mathematics</td><td>male</td><td>2</td><td>5</td><td>83</td><td>30</td></tr><tr><td>student64</td><td>Languages</td><td>female</td><td>0</td><td>21</td><td>9</td><td>93</td></tr><tr><td>student65</td><td>Mathematics</td><td>male</td><td>20</td><td>86</td><td>13</td><td>96</td></tr><tr><td>student66</td><td>Languages</td><td>female</td><td>28</td><td>35</td><td>87</td><td>57</td></tr><tr><td>student67</td><td>Mathematics</td><td>male</td><td>36</td><td>50</td><td>29</td><td>10</td></tr><tr><td>student68</td><td>Languages</td><td>female</td><td>60</td><td>90</td><td>96</td><td>6</td></tr><tr><td>student69</td><td>Mathematics</td><td>male</td><td>34</td><td>61</td><td>43</td><td>98</td></tr><tr><td>student70</td><td>Languages</td><td>female</td><td>13</td><td>37</td><td>91</td><td>83</td></tr><tr><td>student71</td><td>Mathematics</td><td>male</td><td>47</td><td>80</td><td>57</td><td>82</td></tr><tr><td>student72</td><td>Languages</td><td>female</td><td>69</td><td>43</td><td>37</td><td>37</td></tr><tr><td>student73</td><td>Mathematics</td><td>male</td><td>54</td><td>60</td><td>94</td><td>21</td></tr><tr><td>student74</td><td>Languages</td><td>female</td><td>71</td><td>14</td><td>34</td><td>46</td></tr><tr><td>student75</td><td>Mathematics</td><td>male</td><td>89</td><td>96</td><td>31</td><td>17</td></tr><tr><td>student76</td><td>Languages</td><td>female</td><td>28</td><td>48</td><td>29</td><td>94</td></tr><tr><td>student77</td><td>Mathematics</td><td>male</td><td>100</td><td>65</td><td>20</td><td>24</td></tr><tr><td>student78</td><td>Languages</td><td>female</td><td>11</td><td>96</td><td>90</td><td>33</td></tr><tr><td>student79</td><td>Mathematics</td><td>male</td><td>53</td><td>55</td><td>93</td><td>39</td></tr><tr><td>student80</td><td>Languages</td><td>female</td><td>1</td><td>100</td><td>84</td><td>44</td></tr><tr><td>student81</td><td>Mathematics</td><td>male</td><td>63</td><td>78</td><td>96</td><td>43</td></tr><tr><td>student82</td><td>Languages</td><td>female</td><td>41</td><td>69</td><td>82</td><td>35</td></tr><tr><td>student83</td><td>Mathematics</td><td>male</td><td>94</td><td>98</td><td>13</td><td>9</td></tr><tr><td>student84</td><td>Languages</td><td>female</td><td>94</td><td>72</td><td>91</td><td>77</td></tr><tr><td>student85</td><td>Mathematics</td><td>male</td><td>71</td><td>32</td><td>45</td><td>25</td></tr><tr><td>student86</td><td>Languages</td><td>female</td><td>9</td><td>89</td><td>64</td><td>37</td></tr><tr><td>student87</td><td>Mathematics</td><td>male</td><td>89</td><td>1</td><td>73</td><td>67</td></tr><tr><td>student88</td><td>Languages</td><td>female</td><td>43</td><td>41</td><td>68</td><td>79</td></tr><tr><td>student89</td><td>Mathematics</td><td>male</td><td>7</td><td>38</td><td>22</td><td>37</td></tr><tr><td>student90</td><td>Languages</td><td>female</td><td>94</td><td>83</td><td>93</td><td>37</td></tr><tr><td>student91</td><td>Mathematics</td><td>male</td><td>82</td><td>84</td><td>2</td><td>61</td></tr><tr><td>student92</td><td>Languages</td><td>female</td><td>46</td><td>41</td><td>30</td><td>69</td></tr><tr><td>student93</td><td>Mathematics</td><td>male</td><td>47</td><td>19</td><td>85</td><td>83</td></tr><tr><td>student94</td><td>Languages</td><td>female</td><td>39</td><td>14</td><td>64</td><td>62</td></tr><tr><td>student95</td><td>Mathematics</td><td>male</td><td>71</td><td>31</td><td>46</td><td>28</td></tr><tr><td>student96</td><td>Languages</td><td>female</td><td>90</td><td>94</td><td>45</td><td>40</td></tr><tr><td>student97</td><td>Mathematics</td><td>male</td><td>46</td><td>89</td><td>2</td><td>5</td></tr><tr><td>student98</td><td>Languages</td><td>female</td><td>41</td><td>43</td><td>47</td><td>99</td></tr><tr><td>student99</td><td>Mathematics</td><td>male</td><td>71</td><td>90</td><td>89</td><td>73</td></tr><tr><td>student100</td><td>Languages</td><td>female</td><td>31</td><td>64</td><td>18</td><td>56</td></tr><tr><td>student101</td><td>Mathematics</td><td>male</td><td>52</td><td>13</td><td>69</td><td>99</td></tr><tr><td>student102</td><td>Languages</td><td>female</td><td>86</td><td>39</td><td>83</td><td>18</td></tr><tr><td>student103</td><td>Mathematics</td><td>male</td><td>23</td><td>65</td><td>98</td><td>80</td></tr><tr><td>student104</td><td>Languages</td><td>female</td><td>78</td><td>100</td><td>57</td><td>66</td></tr><tr><td>student105</td><td>Mathematics</td><td>male</td><td>69</td><td>21</td><td>43</td><td>97</td></tr><tr><td>student106</td><td>Languages</td><td>female</td><td>27</td><td>2</td><td>78</td><td>38</td></tr><tr><td>student107</td><td>Mathematics</td><td>male</td><td>86</td><td>96</td><td>46</td><td>34</td></tr><tr><td>student108</td><td>Languages</td><td>female</td><td>13</td><td>84</td><td>66</td><td>64</td></tr><tr><td>student109</td><td>Mathematics</td><td>male</td><td>35</td><td>95</td><td>98</td><td>81</td></tr><tr><td>student110</td><td>Languages</td><td>female</td><td>30</td><td>28</td><td>62</td><td>54</td></tr><tr><td>student111</td><td>Mathematics</td><td>male</td><td>60</td><td>31</td><td>35</td><td>85</td></tr><tr><td>student112</td><td>Languages</td><td>female</td><td>19</td><td>81</td><td>19</td><td>69</td></tr><tr><td>student113</td><td>Mathematics</td><td>male</td><td>66</td><td>5</td><td>98</td><td>54</td></tr><tr><td>student114</td><td>Languages</td><td>female</td><td>38</td><td>80</td><td>40</td><td>16</td></tr><tr><td>student115</td><td>Mathematics</td><td>male</td><td>5</td><td>84</td><td>96</td><td>97</td></tr><tr><td>student116</td><td>Languages</td><td>female</td><td>59</td><td>97</td><td>69</td><td>54</td></tr><tr><td>student117</td><td>Mathematics</td><td>male</td><td>0</td><td>34</td><td>79</td><td>49</td></tr><tr><td>student118</td><td>Languages</td><td>female</td><td>18</td><td>7</td><td>12</td><td>85</td></tr><tr><td>student119</td><td>Mathematics</td><td>male</td><td>93</td><td>87</td><td>7</td><td>59</td></tr><tr><td>student120</td><td>Languages</td><td>female</td><td>42</td><td>23</td><td>26</td><td>90</td></tr><tr><td>student121</td><td>Mathematics</td><td>male</td><td>17</td><td>39</td><td>66</td><td>89</td></tr><tr><td>student122</td><td>Languages</td><td>female</td><td>26</td><td>75</td><td>90</td><td>18</td></tr><tr><td>student123</td><td>Mathematics</td><td>male</td><td>34</td><td>23</td><td>77</td><td>80</td></tr><tr><td>student124</td><td>Languages</td><td>female</td><td>52</td><td>6</td><td>77</td><td>42</td></tr><tr><td>student125</td><td>Mathematics</td><td>male</td><td>56</td><td>2</td><td>85</td><td>81</td></tr><tr><td>student126</td><td>Languages</td><td>female</td><td>51</td><td>35</td><td>67</td><td>44</td></tr><tr><td>student127</td><td>Mathematics</td><td>male</td><td>64</td><td>64</td><td>44</td><td>34</td></tr><tr><td>student128</td><td>Languages</td><td>female</td><td>67</td><td>91</td><td>79</td><td>82</td></tr><tr><td>student129</td><td>Mathematics</td><td>male</td><td>4</td><td>26</td><td>15</td><td>79</td></tr><tr><td>student130</td><td>Languages</td><td>female</td><td>72</td><td>10</td><td>3</td><td>69</td></tr><tr><td>student131</td><td>Mathematics</td><td>male</td><td>94</td><td>77</td><td>51</td><td>1</td></tr><tr><td>student132</td><td>Languages</td><td>female</td><td>27</td><td>95</td><td>85</td><td>48</td></tr><tr><td>student133</td><td>Mathematics</td><td>male</td><td>92</td><td>11</td><td>40</td><td>61</td></tr><tr><td>student134</td><td>Languages</td><td>female</td><td>4</td><td>18</td><td>56</td><td>60</td></tr><tr><td>student135</td><td>Mathematics</td><td>male</td><td>8</td><td>42</td><td>26</td><td>52</td></tr><tr><td>student136</td><td>Languages</td><td>female</td><td>7</td><td>60</td><td>47</td><td>21</td></tr><tr><td>student137</td><td>Mathematics</td><td>male</td><td>51</td><td>81</td><td>30</td><td>90</td></tr><tr><td>student138</td><td>Languages</td><td>female</td><td>58</td><td>6</td><td>16</td><td>73</td></tr><tr><td>student139</td><td>Mathematics</td><td>male</td><td>48</td><td>38</td><td>37</td><td>31</td></tr><tr><td>student140</td><td>Languages</td><td>female</td><td>33</td><td>26</td><td>56</td><td>60</td></tr><tr><td>student141</td><td>Mathematics</td><td>male</td><td>84</td><td>84</td><td>29</td><td>75</td></tr>
		</table>
<div id="pager" class="pager">
	<form>
		<img src="https://www.benfund.com/images/elements/table/first.png" class="first"/>
		<img src="https://www.benfund.com/images/elements/table/prev.png" class="prev"/>
		<input type="text" class="pagedisplay"/>
		<img src="https://www.benfund.com/images/elements/table/next.png" class="next"/>
		<img src="https://www.benfund.com/images/elements/table/last.png" class="last"/>
		<select class="pagesize">
			<option selected="selected"  value="10">10</option>

			<option value="20">20</option>
			<option value="30">30</option>
			<option  value="40">40</option>
		</select>
	</form>
</div>

</div>
</body>
</html>