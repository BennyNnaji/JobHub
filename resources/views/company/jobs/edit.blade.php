    @extends('company.layout.app')
    @section('content')
        <div class="w-full rounded-t-2xl bg-gray-400 text-gray-200 font-semibold text-3xl px-4 flex justify-between">
            <div>
            Update Job
            </div>
            <div class="w-2/12 md:w-auto">
                <a href="{{ url()->previous() }}"><img src="{{ asset('images/front/back.png') }}" alt="icon"
                        class="w-full"></a>
            </div>
        </div>
        <section class="w-full md:w-10/12 mx-auto">
            <form action="{{ route('company_jobs.update', $job->id) }}" method="post">
             
                @csrf
                <div class="w-11/12 md:w-5/6 mx-auto md:flex">

                    <div class="w-full md:w-1/2 mx-2 my-2">
                        <label for="job_title" class="block text-sm font-bold text-gray-700">Job Title</label>
                        <input type="text" name="job_title" id="job_title" placeholder="Job Title"
                            value="{{ $job->job_title }}"
                            class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-red-600 focus:border-red-500">
                        @error('job_title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="w-full md:w-1/2 mx-2 my-2">
                        <label for="job_type" class="block text-sm font-bold text-gray-700">Job Type</label>
                        <select name="job_type" id="job_type"
                            class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-red-600 focus:border-red-500">
                            <option value="{{ $job->job_type }}">{{ $job->job_type }}</option>
                            <option value="Full Time">Full Time</option>
                            <option value="Part Time">Part Time</option>
                            <option value="Internship">Internship</option>
                        </select>
                        @error('job_type')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="w-11/12 md:w-5/6 mx-auto">
                    <label for="job_description" class="block text-sm font-bold text-gray-700">Job Description</label>
                    <textarea name="job_description" id="job_description" cols="" rows=""
                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-red-600 focus:border-red-500">{{ $job->job_description }}</textarea>
                    @error('job_description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-11/12 md:w-5/6 mx-auto my-3">
                    <label for="category" class="block text-sm font-bold text-gray-700">Category</label>
                    <select name="category" id="category"
                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-red-600 focus:border-red-500">
                        <option value="{{ $job->category }}">{{ $job->category }}</option>
                        <option value="Construction and Architecture">Construction and Architecture</option>
                        <option value="Creative Arts and Design">Creative Arts and Design</option>
                        <option value="Customer Service">Customer Service</option>
                        <option value="Education and Training">Education and Training</option>
                        <option value="Engineering">Engineering</option>
                        <option value="Environmental and Sustainability">Environmental and Sustainability</option>
                        <option value="Finance">Finance</option>
                        <option value="Government and Public Administration">Government and Public Administration</option>
                        <option value="Healthcare">Healthcare</option>
                        <option value="Hospitality and Tourism">Hospitality and Tourism</option>
                        <option value="Human Resources">Human Resources</option>
                        <option value="Information Technology">Information Technology</option>
                        <option value="Legal">Legal</option>
                        <option value="Logistics and Transportation">Logistics and Transportation</option>
                        <option value="Manufacturing and Production">Manufacturing and Production</option>
                        <option value="Research and Development">Research and Development</option>
                        <option value="Retail">Retail</option>
                        <option value="Sales and Marketing">Sales and Marketing</option>
                        <option value="Social Services">Social Services</option>
                        <option value="Telecommunications">Telecommunications</option>
                    </select>
                    @error('category')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-11/12 md:w-5/6 mx-auto">
                    <div class="w-full md:w-1/2 mx-2 mt-4">Annual Salary Range</div>
                </div>
                <div class="w-11/12 md:w-5/6 mx-auto md:flex">

                    <div class="w-full md:w-1/2 mx-2 mb-2">
                        <label for="salary" class="block text-sm font-bold text-gray-700">Min Salary</label>
                        <input type="number" name="min_salary" id="salary" placeholder="Minimum Salary"
                            value="{{ $job->min_salary }}"
                            class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-red-600 focus:border-red-500">
                        @error('min_salary')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="w-full md:w-1/2 mx-2 my-2">
                        <label for="salary" class="block text-sm font-bold text-gray-700">Max Salary</label>
                        <input type="number" name="max_salary" id="salary" placeholder="Maximum Salary"
                            value="{{$job->max_salary}}"
                            class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-red-600 focus:border-red-500">
                        @error('max_salary')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="w-11/12 md:w-5/6 mx-auto md:flex">
                    <div class="w-full md:w-1/2 mx-2 my-2">
                        <label for="job_location" class="block text-sm font-bold text-gray-700">Job Location</label>
                        <input type="text" name="job_location" id="job_location" placeholder="Job Location"
                            value="{{$job->job_location }}"
                            class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-red-600 focus:border-red-500">
                        @error('job_location')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>



                    <div class="w-full md:w-1/2 mx-2 my-2">
                        <label for="deadline" class="block text-sm font-bold text-gray-700">Deadline</label>
                        <input type="date" name="deadline" id="deadline" placeholder="Deadline"
                            value="{{ $job->deadline }}"
                            class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-red-600 focus:border-red-500">
                        @error('deadline')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="w-11/12 md:w-5/6 mx-auto md:flex">
                    <div class="w-full md:w-1/2 mx-2 my-2">
                        <label for="responsibility" class="block text-sm font-bold text-gray-700">Responsibility</label>
                        <textarea name="responsibility" id="responsibility" cols="" rows=""
                            class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-red-600 focus:border-red-500">{{ $job->responsibility }}</textarea>
                        @error('responsibility')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full md:w-1/2 mx-2 my-2">
                        <label for="benefits" class="block text-sm font-bold text-gray-700">Benefits</label>
                        <textarea name="benefits" id="benefits" cols="" rows=""
                            class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-red-600 focus:border-red-500">{{ $job->benefits }}</textarea>
                        @error('benefits')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="w-11/12 md:w-5/6 mx-auto">
                    <label for="job_status" class="block text-sm font-bold text-gray-700">Job Status</label>
                    <input type="radio" name="job_status" checked id="job_status" value="1"> Active
                    <input type="radio" name="job_status" id="job_status" value="0"> Inactive
                    @error('job_status')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-2/6 my-2 mx-auto">
                    <button type="submit"
                        class="w-full px-4 py-2 mt-2 border rounded-md bg-red-500 text-white hover:bg-red-600">Update
                        Job</button>
                </div>







                </div>
            </form>

        </section>
    @endsection
